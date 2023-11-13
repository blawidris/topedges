<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {

        $users = User::orderBy('created_at', 'desc')->get();

        $users->flatMap(function ($user) {
            $user->name = ucfirst($user->f_name) . " " . ucfirst($user->l_name);
            $user->date = date('j M, Y H:i a');
            $user->status = $user->status == 1 ? 'active' : 'inactive';

            return $user;
        });

        $data = [
            'users' => $users
        ];

        return view('admin.customers.index', $data);
    }


    public function show($customer, User $user)
    {
        $user = $user->where('id', $customer)->first();

        $user->name = ucfirst($user->f_name) . " " . ucfirst($user->l_name);
        $user->date = date('j M, Y H:i a');
        $user->status = $user->status == 1 ? 'active' : 'inactive';

        $withdraw =  $user->transactions->where('type', 'withdraw')->sum('price_amount');

        $data = ['user' => $user, 'withdraw' => $withdraw];

        return view('admin.customers.show', $data);
    }


    public function update(Request $request, User $user)
    {

        // store data
        $user = $user->first();

        if (!$user) {
            return response()->json(['message' => 'Customer not found'], 404);
        }

        // dd($request->all());

        $name = explode(' ', $request->name);

        // dd($name);

        $updateUser = $user->update([
            'f_name' => $name[0],
            'l_name' => $name[1],
            'address' => $request->address1,
            'city' => $request->city,
            'state' => $request->state,
            'postalcode' => $request->postalcode,
            'country' => $request->country,
        ]);

        if (!$updateUser) {
            return response()->json();
        }

        return response()->json(['message' => 'User details updated', 'statusCode' => 201], 201);
    }

    public function updateWallet(Request $request, Wallet $wallet)
    {

        // dd($request->all());

        $amount = $this->filterValue($request->amount);

        $wallet = $wallet->where(['user_id' => $request->user_id, 'id' => $request->wallet_id])->first();

        if (!$wallet) {
            return response()->json(['message' => 'Data not found'], 404);
        }

        $current_balance = $wallet->current_balance;

        $newbalance = $current_balance + $amount;

        // dd($amount);

        $wallet->update([
            'current_balance' => $newbalance
        ]);

        return response()->json(['message' => 'Wallet balance updated'], 204);
    }

    public function destroy($customer)
    {
        $customer = User::find($customer);

        if (!$customer) {
            return response()->json(['message' => 'Customer not found',], 404);
        }

        // delete content
        $customer->delete();

        return response()->json(['message' => 'Customer deleted', 'status' => 204], 204);
    }


    function filterValue($val)
    {

        // Remove the dollar sign and commas from the string.
        $string = preg_replace("/[^\d.]/", "", $val);

        // Convert the string to a float.
        $value = (int)$string;

        // Output the value.
        return $value;
    }
}
