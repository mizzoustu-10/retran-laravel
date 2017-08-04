<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class StudViewController extends Controller {
    public function index(){
        //$query = Request::get('q');
        //return $query;

        $rows = DB::select('select * from outindexdftr limit 30');
        return view('stud_view',['rows'=>$rows]);
   }
}