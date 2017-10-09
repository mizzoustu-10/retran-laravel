<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class userController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function show(){
    	$user = User::whereId(Auth::id())->firstOrFail();
	return view('userAccount', compact('user'));
    }
}
