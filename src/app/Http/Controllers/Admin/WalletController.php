<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Wallet;
use App\Notifications\Wallet\DepositApproval;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class WalletController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {

        $data = [
            'transactions' => Transaction::orderBy('created_at', 'desc')->get()
        ];
        return view('admin.wallets.index', $data);
    }

    public function destroy($customer, $wallet)
    {
        $wallet = Transaction::where(['user_id' => $customer, 'id' => $wallet])->first();

        if (!$wallet) {
            return response()->json(['message' => 'Wallet not found',], 404);
        }

        // delete content
        $wallet->delete();

        return response()->json(['message' => 'Transaction  deleted', 'status' => 200], 200);
    }

    public function approve($customer, $wallet)
    {
        $trans = Transaction::where(['user_id' => $customer, 'id' => $wallet])->first();
        $user = User::where('id', $customer)->first();

        if (!$trans) {
            return response()->json(['message' => 'Transaction not found', 'status' => 400,], 404);
        }

        if ($trans->status) {
            return response()->json(['message' => 'Transaction already approved','status' => 400,], 400);
        }

        $price = $trans->price_amount;

        //  content
        $trans->update([
            'status' => 1
        ]);

        // notify user
        $user->notify(new DepositApproval($trans));


        // update wallet
        $wallet = Wallet::where('user_id', $customer)->first();

        $current_balance = 0;

        if ($wallet) {

            $current_balance =  $wallet->current_balance;
            $newBalance = $current_balance + $price;

            $wallet->update([
                'current_balance' => $newBalance
            ]);

            return response()->json(['message' => 'Transaction approve', 'status' => 200, 'current_balance' => $wallet->current_balance], 200);
        }

        $wallet =  Wallet::create([
            'user_id' => $customer,
            'current_balance' => $price,
            'daily_earning' => 0,
            'next_mine_date' => now()->addDays(1)
        ]);

        return response()->json(['message' => 'Transaction approve', 'status' => 200, 'current_balance' => $wallet->current_balance], 200);
    }
}
