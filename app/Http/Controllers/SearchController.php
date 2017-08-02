<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use App\Search;

class SearchController extends Controller
{
    //
    public function index()
    {
        //$search = App\Search::limit(35)->offset(35)->get();
        $apn = request('fetchinput');
        //$bed = request('bed');
        //$search = App\Search::find($apn);
        $search = App\Search::where('apn', 'like', '%'.$apn.'%')
         //   ->where('bed', '=', $bed)
            ->paginate(5);
        
        //dd($search);

        //return view('search', compact('search'));
        return View('viewRecordsGUI', ['search'=>$search]);
    }

    public function show(Search $count2)
    {
        //$search = App\Search::find($id);
        //dd($search);
        //return view('search', compact('search'));
        return $count2;
    }

    /*public function search()
    {
        return view('results');

    }
    */

    public function result()
    {
        //dd(request()->all());
        //dd(request('apn'));
        $apn = request('apn');
        return view('search', compact('apn'));
    }
}
