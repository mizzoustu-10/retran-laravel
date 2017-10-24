<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Bookmark;

class bookmarkController extends Controller
{
	 public function __construct(){
		$this->middleware('auth');
	}
	
	public function bookmarkRecord(){
		$count2 = request('recordValue');
		$record = DB::table('outindexdftr')->select(array('Situs_Street', 'Situs_City', 'Mail_Carrier_Route', 'Situs_Zip'))
			->where('count2', $count2)->first();
		$recordName = $record->Situs_Street . ', ' . $record->Situs_City . ' ' . $record->Mail_Carrier_Route . ', ' . $record->Situs_Zip;
		$bookmark = Bookmark::firstOrNew(array('count2' => $count2, 'user_id' => Auth::id()));
		$bookmark->count2 = $count2;
		$bookmark->user_id = Auth::id();
		$bookmark->address = $recordName;
		$saved = $bookmark->save();
		if($saved){
			$response = array(
				'status' => 'success',
				'msg' => 'Bookmark saved successfully',
			);
		}
		else{
			$response = array(
				'status' => 'failed',
				'msg' => 'Error saving bookmark',
			);
		}
		return \Response::json($response);
	}

	public function destroyBookmark(Bookmark $bookmark){
		$bookmark->delete();
		return redirect()->route('account');
	}
}
