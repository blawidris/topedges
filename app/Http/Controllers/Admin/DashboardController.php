<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(){

        $users = User::query()->orderBy('created_at', 'desc');

        $transactions = Transaction::query()->with('user');

        $allTransactions = $transactions->limit(7)->get();
        $allUsers= $users->limit(7)->get();


        $totalDeposit = $transactions->where(['type' => 'deposit', 'status' => 1])->sum('price_amount');
        $pendingDeposit = $transactions->where(['type' => 'deposit', 'status' => 0])->sum('price_amount');

        $totalWithdraw = $transactions->where(['type' => 'withdraw','status' => 1])->sum('price_amount');
        $pendingWithdraw = $transactions->where(['type' => 'withdraw','status' =>0 ])->sum('price_amount');
        $totalUsers = $users->where(['status' => 1])->count();
        $pendingUsers = $users->where(['status' => 0])->count();

        $data = [
            'totalDeposit' => $totalDeposit,
            'pendingDeposit' => $pendingDeposit,
            'totalWithdraw' => $totalWithdraw,
            'pendingWithdraw' => $pendingWithdraw,
            'totalUsers' => $totalUsers,
            'pendingUsers' => $pendingUsers,
            'transactions' => $allTransactions,
            'users' => $allUsers
        ];


        return view('admin.dashboard', $data);
    }


    public function customers(){
        $users = User::orderBy('created_at', 'desc')->get();

        return view('admin.customers.index', ['user' => $users]);
    }
}
