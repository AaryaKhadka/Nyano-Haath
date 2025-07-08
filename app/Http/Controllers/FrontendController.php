<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    
    public function trending(){
        return view('pages.trending');
    }

    public function login(){
        return view('auth.login');
    }
}
