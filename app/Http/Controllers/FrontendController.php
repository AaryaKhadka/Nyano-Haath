<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    
    public function trending(){
        return view('pages.trending');
    }
     public function categories(){
        return view('pages.categories');
    }
    public function categoriesInside(){
        return view('pages.categoriesInside');

    }

    public function login(){
        return view('auth.login');
    }
}
