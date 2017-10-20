<?php

namespace App;
use App\Search;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class BatchSearch1
{
    public static function apply(Request $filters)
    {
        $from = request('startdate');
        $to = request('enddate');
        $county = request('county');
        $city = request('city');

        $countcity = count($city);
        $countcounty = count($county);

        $search = (new Search)->newQuery();
        $search = $search->whereBetween('recording_date', [$from, $to]);

        if (isset($county))
        {
            if ($countcounty == 1)
            {
                if ($county[0] == "LA")
                {
                    $county[0] = " ";
                    $search->where(function ($query) use ($county)
                    {
                        $query->where('county', '=', $county[0]);
                    });
                    
                }
                else
                {
                    $search->where(function ($query) use ($county)
                    {
                        $query->where('county', '=', $county[0]);
                    });
                }
            }
            else
            {
                $search->where(function ($query) use ($county, $countcounty)
                {
                    for ($counter = 0; $counter < $countcounty; $counter++)
                    {
                        if ($county[$counter] == "LA")
                        {
                            $county[$counter] = " ";
                        }

                       if ($counter == 0)
                       {
                            $query->where('county', '=', $county[$counter]);
                       } 
                       else
                       {
                            $query->orwhere('county', '=', $county[$counter]);
                       }
                    }
                });
            }
        }

        if (isset($city))
        {
            if ($countcity == 1)
            {
                $search->where(function ($query) use ($city)
                {
                    $query->where('situs_city', '=', $city[0]);
                });
            }
            else
            {
                $search->where(function ($query) use ($city, $countcity)
                {
                    for ($counter = 0; $counter < $countcity; $counter++)
                    {
                       if ($counter == 0)
                       {
                            $query->where('situs_city', '=', $city[$counter]);
                       } 
                       else
                       {
                            $query->orwhere('situs_city', '=', $city[$counter]);
                       }
                    }
                });
            }
        }
        $result = $search->paginate(10);
        
        return View('batch', ['search'=>$result]);
    }
}