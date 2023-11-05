<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        // $data = ['user' => ''];
        return view('index');
    }

    public function markets()
    {
        return view('frontend.markets');
    }

    public function faqs()
    {
        return view('frontend.faqs');
    }


    public function aboutus()
    {
        return view('frontend.about-us');
    }

    public function terms()
    {
        return view('frontend.terms');
    }



    public function contact(){
        return view('frontend.contact');
    }
}
