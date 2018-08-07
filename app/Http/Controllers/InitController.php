<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class InitController extends Controller
{
	// public function __construct(){
 //    	$this->middleware('auth');
 //    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }

    public function index(){
        return view('init');
    }
}
