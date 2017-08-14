<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Search;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class SearchController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        //$search = App\Search::limit(35)->offset(35)->get();
        $fetchinput = request('fetchinput');
        $criteria = request('criteria');
        $search = App\Search::where($criteria, 'like', '%'.$fetchinput.'%')
                ->paginate(5);
            return View('viewRecordsGUI', ['search'=>$search]);
        /*
        if ($criteria == "apn")
        {
            $search = App\Search::where('apn', 'like', '%'.$fetchinput.'%')
                ->paginate(5);
        }
        elseif ($criteria == "situs_street") {
             $search = App\Search::where('Situs_Street', 'like', '%'.$fetchinput.'%')
                ->paginate(5);
        }
        elseif ($criteria == "document_number") {
             $search = App\Search::where('document_number', 'like', '%'.$fetchinput.'%')
                ->paginate(5);
            return View('viewRecordsGUI', ['search'=>$search]);
        }
        elseif ($criteria == "tee_loan_number") {
            $search = App\Search::where('tee_loan_number', 'like', '%'.$fetchinput.'%')
                ->paginate(5);
        }
        elseif ($criteria == "tee_number") {
            $search = App\Search::where('tee_number', 'like', '%'.$fetchinput.'%')
                ->paginate(5);
        }
        elseif ($criteria == "trustor_full_name") {
            $search = App\Search::where('trustor_full_name', 'like', '%'.$fetchinput.'%')
                ->paginate(5);
        }
        elseif ($criteria == "owner_phone_number") {
            $search = App\Search::where('owner_phone_number', 'like', '%'.$fetchinput.'%')
                ->paginate(5);
        }
        else {
            return view('search');
        }
        */
        /*
        $search = App\Search::where('apn', 'like', '%'.$fetchinput.'%')
         //   ->where('bed', '=', $bed)
            ->paginate(5);
        */
        //dd($criteria);

        //return view('search', compact('search'));
       // return View('viewRecordsGUI', ['search'=>$search]);
    }
    public function batchsearch()
    {
        $from = request('startdate');
        $to = request('enddate');
        $bed = request('bed');
        $bath = request('bath');
        $minsq = request('minsqft');
        $maxsq = request('maxsqft');
        $minlot = request('minlot');
        $maxlot = request('maxlot');
        $units = request('units');
        $minmls = request('minmls');
        $maxmls = request('maxmls');
        
        $search = App\Search::whereBetween('recording_date', [$from, $to])
                ->where('bed', '=', $bed)
                //->where('CAST(bath AS unsigned)', '=', $bath)
                ->where('bath', '=', $bath)
                ->whereBetween('sq_feet', [$minsq, $maxsq])
                ->whereBetween('lot_size', [$minlot, $maxlot])
                ->where('number_of_units', '=', $units)
                ->paginate(5);
            return View('viewRecordsGUI', ['search'=>$search]);
        
    }
    public function resultdetails(Search $count2)
    {
        $apn = App\Search::find($count2)
            ->pluck('APN');

        $result = DB::table('outindexdftr')
            ->join('outtd', 'outindexdftr.apn', '=', 'outtd.apn')
            ->where('outindexdftr.apn', '=', $apn)
            ->get();

        dd($result);
        //$search = App\Search::find($id);
        //dd($search);
        //return view('search', compact('search'));
        //return $count2;
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
