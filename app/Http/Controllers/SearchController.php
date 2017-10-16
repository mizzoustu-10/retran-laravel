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
    public function index(Request $request)
    {
        $fetchinput = $request->input('fetchinput');
        $criteria = $request->input('criteria');
        $search = App\Search::where($criteria, 'like', '%'.$fetchinput.'%')
                ->paginate(10);
            return View('batch', ['search'=>$search]);
            
    }
    public function batchsearch(Request $request)
    {
        $from = request('startdate');
        $to = request('enddate');
        $city = request('city');
        $county = request('county');
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
                ->where('situs_city', '=', $city)
                ->where('bed', '=', $bed)
                ->where('bath', '=', $bath)
                ->whereBetween('sq_feet', [$minsq, $maxsq])
                ->whereBetween('lot_size', [$minlot, $maxlot])
                ->where('number_of_units', '=', $units)
                ->paginate(10);
            
            return View('batch', ['search'=>$search]);
    }
    public function resultdetails(Search $count2)
    {
        $apn = App\Search::find($count2)
            ->pluck('APN');

        /*    
        $result = DB::table('outindexdftr')
            ->join('outtd', 'outindexdftr.apn', '=', 'outtd.apn')
            ->where('outindexdftr.apn', '=', $apn)
            ->get();
        */
            $result = DB::table('outindexdftr')
            ->join('outtracking', 'outindexdftr.apn', '=', 'outtracking.apn')
            ->where('outindexdftr.apn', '=', $apn)
            ->get();
            $count = count($result);
            
        if ($count == 0)
        {
            $result = DB::table('outindexdftr')
            ->join('outtd', 'outindexdftr.apn', '=', 'outtd.apn')
            ->where('outindexdftr.apn', '=', $apn)
            ->get();
            $count = count($result);
            if ($count == 0)
            {
                $result = DB::table('outindexdftr')
                ->where('outindexdftr.apn', '=', $apn)
                ->get();
                return View('resultDetailsGUI', ['result'=>$result]);
            }
            else
            {
                return View('resultDetailsGUI', ['result'=>$result]);
            }
        }
        else
        {
            return View('resultDetailsGUI', ['result'=>$result]);
        }

        //dd($result);
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
