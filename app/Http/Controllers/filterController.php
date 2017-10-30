<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Filter;

class filterController extends Controller
{
	 public function __construct(){
		$this->middleware('auth');
	}

	public function saveFilter(Request $request){
		$name = $request->name;
		$filter = Filter::firstOrNew(array('name' => $name, 'user_id' => Auth::id()));
		$filter->name = $name;
		$filter->user_id = Auth::id();
		$filter->options = $request->url;
		$saved = $filter->save();
		if($saved){
			$response = array(
				'status' => 'success',
				'msg' => 'Filter saved successfully',
			);
		}
		else{
			$response = array(
				'status' => 'failed',
				'msg' => 'Error saving filter',
			);
		}
		return \Response::json($response);
	}

	public function destroyFilter(Filter $filter){
		$filter->delete();
		return redirect()->route('account');
	}
}
