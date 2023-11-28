<?php

namespace App\Http\Controllers;

use App\Mail\DepositMail;
use App\Mail\Wallet\NotifyAdmin;
use App\Mail\Wallet\NotifyAdminUserWithdraw;
use App\Mail\Withdraw;
use App\Models\ReferalTracker;
use App\Models\Wallet;
use App\Models\Transaction;
use App\Models\User;
use App\Notifications\Wallet\Deposit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use BitWasp\Bitcoin\Address\PayToPubKeyHashAddress;
use BitWasp\Bitcoin\Key\PrivateKeyFactory;
use Illuminate\Support\Carbon;

class WalletsController extends Controller
{
    private $payment_api_key;
    private $payment_url = "https://api.nowpayments.io/v1";

    public function __construct()
    {
        $this->middleware('auth');
        $this->payment_api_key =  config('app.nowpayment_api_key');
        $this->payment_url =  config('app.nowpayment_api_url');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'user' => Auth::user(),
            'wallet' => Transaction::orderBy('created_at', 'desc')->where('user_id', Auth::id())->paginate(10)

        ];

        return view('frontend.wallets.index', $data);
    }

    public function daily_mine()
    {

        $data = [
            'user' => Auth::user(),
        ];


        return view('frontend.wallets.minning-wall', $data);
    }

    public function add_address(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'wallet_address' => 'required|string|max:24'
        ]);

        if ($validator->fails()) {
            return back()->with(['status' => 'danger', 'message' => $validator->errors()->first()]);
        }

        $data = [
            'user_id' => $request->user_id,
            'wallet_address' => $request->wallet_address
        ];


        // $wallet = Wallet::where('user_id', $request->user_id)->first();

        if ($request->wallet_id) {
            Wallet::where('id', $request->wallet_id)->update($data);
        } else {
            Wallet::create($data);
        }

        return back()->with(['status' => 'success', 'message' => 'Wallet address added successfully']);
    }

    public function paymentResponse()
    {
        $data = [
            'user' => Auth::user(),
            'response' => Transaction::where('user_id', Auth::user()->id)->first()
        ];

        return view('frontend.wallets.payment-info', $data);
    }

    public function deposit(
        Request $request,
        Transaction $trans
    ) {

        $validator = Validator::make($request->all(), [
            'amount' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return back()->with(['status' => 'danger', 'message' => $validator->errors()->first()]);
        }


        $date = Carbon::now();

        $data = [

            "user_id" => $request->user_id,
            "payment_id" => rand(1111111, 9999999),
            "payment_status" => "waiting",
            "pay_address" => "",
            "price_amount" => $request->amount,
            "price_currency" => "usd",
            "pay_amount" => $request->pay_amount,
            "pay_currency" => $request->currency_type,
            'order_description' => 'Request to deposit',
            'order_id' => 'TE-' . $this->generate_random_number(8),
            "purchase_id" => $this->generate_random_number(8),
            "amount_received" => null,
            "payin_extra_id" => null,
            "smart_contract" => "",
            "network" => "btc",
            "network_precision" => 8,
            "time_limit" => null,
            "burning_percent" => null,
            'status' => 0,
            "expiration_estimate_date" => $date->addDays(2),
            'type' => 'deposit'
        ];

        $trans =  $trans->create($data);

        // send email to admin
        Mail::to('elisamargaret0202@gmail.com')->send(new NotifyAdmin($trans));

        // notify user on deposit
        $user = User::where('id', Auth::user()->id)->first();
        $user->notify(new Deposit($trans));

        return back()->with(['status' => 'warning', 'message' => 'Payment failed']);
    }

    function updateDeposit(Transaction $trans, Request $request)
    {

        $data = [
            'status' => 1,
            'payment_status' => $request->payment_status,

        ];

        if (($request->payment_status == 'expired') || $request->payment_status == 'failed') {
            $data['status'] = 2;
            Transaction::where('payment_id', $request->payment_id)->update($data);

            // send email
            Mail::to(Auth::user()->email)->send(new DepositMail($request->all()));

            return json_encode(['status' => 'error', 'message' => 'session expire']);
        }


        // update transaction status
        Transaction::where('payment_id', $request->payment_id)->update($data);

        // add
        $user = Auth::user();

        // get transaction details
        $trans = Transaction::where('payment_id', $request->payment_id)->first();

        // return json_encode($trans);

        $wallet = [
            'user_id' => $trans->user_id,
            'amount' => $trans->price_amount
        ];

        // add one time referal bonus
        $this->addReferalBonus($wallet);


        // update wallet data
        if ($this->fundWallet($wallet))

            $email = [
                'user' => $user,
                'payment' => $request->all()
            ];

        // send email
        Mail::to(Auth::user()->email)->send(new DepositMail($email));

        return json_encode(['status' => 'success', 'message' => 'Payment Successfull']);
        // return redirect('/wallet')->with(['status' => 'success', 'message' => 'Payment Successfull']);
    }

    public function withdraw(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'amount' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return back()->with(['status' => 'danger', 'message' => $validator->errors()->first()]);
        }

        $wallet_id = $request->wallet_id;
        $user_id = $request->user_id;
        $type =  'withdraw';


        $wallet = new Wallet();
        $wallet = $wallet->fetch($wallet_id);

        // dd($wallet);

        if (empty($wallet->current_balance)) {
            return back()->with(['status' => 'error', 'message' => 'Insufficient wallet balance']);
        }

        // save to db
        $data = [
            'price_amount' => $request->amount,
            'type' => $type,
            'user_id' => $user_id,
            'status' => 0,
            'pay_amount' => $request->pay_amount,
            'order_description' => 'Request for withdraw',
            'order_id' => 'TE-' . $this->generate_random_number(8)
        ];

        if ($trans = Transaction::create($data)) {
            $data['name'] = Auth::user()->f_name . ' ' . Auth::user()->l_name;

            // send email
            Mail::to(Auth::user()->email)->send(new Withdraw($data));

            // send email to admin
            Mail::to('Elisamargaret0202@gmail.com')->send(new NotifyAdminUserWithdraw($trans));

            return back()->with(['status' => 'success', 'message' => 'Withdraw request was successful']);
        }


        // send email

    }

    public function get_estimated_price($amount, $type)
    {



        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->payment_url . "/estimate?amount=$amount&currency_from=usd&currency_to=$type",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                "x-api-key: $this->payment_api_key"
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        return $response;
    }

    function mineNow(Wallet $wallet)
    {
        if ($user_id = Auth::id()) {
            $wallet = $wallet->fetchByUserId($user_id);

            if (empty($wallet->current_wallet)) {
                return back()->with(['status' => 'error', 'message' => 'Balance insufficient to perform transaction']);
            }
            // convert date
            $today = time();
            $convert_next_date  = null;

            $days = null;
            if (!empty($wallet->next_mine_date)) {
                $convert_next_date = strtotime($wallet->next_mine_date);
                $countDown =  $today - $convert_next_date;
                $days = round($countDown / (60 * 60 * 24));
            }

            if ($convert_next_date > $today) {
                return back()->with(['status' => 'warning', 'message' => 'You have completed your mine for today, try again tomorrow']);
            }

            $current_balance =  $wallet->current_balance;
            $today_earn = ($current_balance * 0.01); // calculate interest

            if ($days > 0) {
                $today_earn *= $days;
            }

            // update current balance
            $current_balance += $today_earn;

            // dd(abs($today_earn));

            //  update wallet db
            $data = [
                'current_balance' => abs($current_balance),
                'daily_earning' => $today_earn,
                'next_mine_date' =>  date('Y-m-d', strtotime('+1 days'))
            ];


            if ($wallet->updateByUserId($user_id, $data)) {
                return back()->with(['status' => 'success', 'message' => "You have earn $$today_earn interest today"]);
            }
        }
    }

    public function knowPaymentStatus(Request $request)
    {

        if ($request->payment_id) {

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "$this->payment_url/payment/$request->payment_id",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                    "x-api-key: $this->payment_api_key"
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);

            return response()->json(json_decode($response, true), 200);
        }
    }

    private function makePayment($data)
    {

        // return $this->payment_api_key;

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "$this->payment_url/payment",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array(
                "x-api-key: $this->payment_api_key",
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }

    private function fundWallet($data)
    {
        $user_id = $data['user_id'];
        $amount = $data['amount'];


        $wallet =  Wallet::where('user_id', $user_id)->first();

        if (!empty($wallet) && !empty($wallet->current_balance)) {

            $new_balance = $wallet->current_balance + $amount;

            Wallet::where('id', $wallet->id)->update([
                'current_balance' => $new_balance
            ]);
        } else {
            Wallet::create([
                'user_id' => $user_id,
                'current_balance' => $amount
            ]);
        }

        return true;
    }

    function addReferalBonus($data)
    {
        $user_id = $data['user_id'];

        // Fetch referal info
        $referal = ReferalTracker::where('referred_user_id', $user_id)->first();

        // return $referal;


        if (!empty($referal) && empty($referal->referal_bonus)) {

            $cal_refer_bonus = $data['amount'] * 0.05;

            $bonus = ['referal_bonus' => $cal_refer_bonus];

            ReferalTracker::where('id', $referal->id)->update($bonus);

            // update user Wallet
            $wallet = Wallet::where('user_id', $referal->user_id)->first();

            $current_balance = $wallet->current_balance + $cal_refer_bonus;

            Wallet::where('user_id', $referal->user_id)->update(['current_balance' => $current_balance]);
        }
    }


    public function generateWallet()
    {
        $api_key = "BNsNobVZAdEiPSqgXWxW7zDv00n30Egi2Dfhe37dzoM";
        $url = 'https://www.blockonomics.co/api/new_address';

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");

        $header = "Authorization: Bearer " . $api_key;
        $headers = array();
        $headers[] = $header;
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $contents = curl_exec($ch);
        if (curl_errno($ch)) {
            echo "Error:" . curl_error($ch);
        }

        $responseObj = json_decode($contents);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($status == 200) {
            return response()->json($responseObj->address, 200);
        } else {
            echo "ERROR: " . $status . ' ' . $responseObj->message;
        }
    }
}
