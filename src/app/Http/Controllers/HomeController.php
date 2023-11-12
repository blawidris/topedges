<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMessage;
use App\Models\ReferalTracker;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function dashboard(Transaction $transaction, ReferalTracker $referal)
    {

        if (empty(Auth::user()->status)){
            Mail::to(Auth::user()->email)->send(new WelcomeMessage());
        }
            $trans = $transaction->sumTotalByType(Auth::id(), 'deposit');
        $referal = $referal->sumAllByUserId(Auth::id()) ?? 0;

        $total = $trans + $referal;
        $pending =  $transaction->sumRecentByType(Auth::id(), 'withdraw');

        $data = [
            'user' => Auth::user(),
            'total_income' => $total,
            'pending_withdraw' =>  $pending,
            'referal_bonus' => $referal,
            'wallet' => $transaction->paginateByUserId(Auth::id(), 8)
        ];
        return view('frontend.dashboard', $data);
    }

    public function settings()
    {
        $data = [
            'user' => Auth::user()
        ];
        return view('frontend.settings', $data);
    }
}
