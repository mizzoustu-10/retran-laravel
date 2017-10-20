<?php

namespace App;
use App\Search;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class BatchSearch
{
    public static function apply(Request $filters)
    {
        $from = request('startdate');
        $to = request('enddate');
        $county = request('county');
        $countcounty = count($county);

        $search = (new Search)->newQuery();
        $search = $search->whereBetween('recording_date', [$from, $to]);
        
        if (isset($county))
        {
            for ($counter = 0; $counter < $countcounty; $counter++)
            {
                if ($countcounty == 1)
                {
                    if ($county[$counter] == "LA")
                    {
                        $county[$counter] = " ";
                        $search->where(function ($query) use ($county, $countcounty, $counter)
                        {
                            $query->where('county', '=', $county[$counter]);
                        });
                        
                    }
                    else
                    {
                        $search->where(function ($query) use ($county, $countcounty, $counter)
                        {
                            $query->where('county', '=', $county[$counter]);
                        });
                    }
                }
                else
                {
                   
                        $search->where(function ($query) use ($county, $countcounty, $counter)
                        {
                            if ($county[$counter] == "LA")
                            {
                                $county[$counter] = " ";
                            }
                            
                            if ($counter == 0)
                            {
                                print $counter;
                                $query->where('county', '=', $county[$counter])
                            }
                            else
                            {
                                print $counter;
                                ->orwhere('county', '=', $county[$counter]);
                            }
                        });
                        //$search->where('county', '=', $county[$counter]);
                    
                }
            }

        }

        $result = $search->paginate(10);
        
        return View('batch', ['search'=>$result]);
    }
}
