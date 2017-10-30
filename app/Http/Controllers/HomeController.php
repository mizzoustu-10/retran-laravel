<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class HomeController extends Controller
{
	public function __construct(){
		$this->middleware('auth')->except('index');
	}
	public function index(){
		if(Auth::check()){
			$user = User::whereId(Auth::id())->firstOrFail();
			return view('fetch', compact('user'));
		}
		else return view('index');
	}
	public function batch(){
		$user = User::whereId(Auth::id())->firstOrFail();
		return view('batch', compact('user'));
	}
}
