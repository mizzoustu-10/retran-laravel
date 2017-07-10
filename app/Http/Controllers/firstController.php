<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

	class FirstController extends Controller{
		public function index(){
			$rows = DB::select('select * from outindexdftr limit 30');
			return View('viewRecordsGUI', ['rows'=>$rows]);
		}
	}
?>