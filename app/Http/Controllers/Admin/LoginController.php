<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){

        return view('admin.auth.login');
    }

    public function login(Request $request){

        $request->validate([
            'email' => 'required|string|unique:users',
            'password' => 'required'
        ]);


        // dd($request->all());

        if(!Auth::guard('admin')->attempt($request->only('email', 'password'))){
            return response()->json(['message' => 'Credentials incorrect', 'statusCode' => 404], 404);
        }

        return response()->json(['message' => 'Login successfully', 'url' => '/dashboard', 'statusCode' => 200], 200);
    }

    public function logout(){

        auth()->guard('admin')->logout();

        return redirect()->route('admin.login');

        // return response()->json(['message' => 'Log out successfully', 'statusCode' => 200], 200);
    }



    public function resetPassword(){
        return view('admin.auth.reset-password');
    }
}
