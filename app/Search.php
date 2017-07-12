<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
    protected $primaryKey = 'count2';
    //
    protected $table = 'outindexdftr';

    public function isComplete()
    {
        return false;
    }
}
