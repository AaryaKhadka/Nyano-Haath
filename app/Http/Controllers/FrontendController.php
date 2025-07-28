<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    
    public function trending(){
        return view('pages.trending');
    }

     public function aboutus(){
        return view('aboutus');
    }

    public function login(){
        return view('auth.login');
    }
    public function campaignpage(){
        return view('campaignpage');
    }

    public function TermsAndCondition(){
        return view('pages.TermsAndCondition');
    }




    public function privacypolicy(){
        return view('privacypolicy');
    }


    public function contactus(){
        return view('pages.contactus');
    }












}