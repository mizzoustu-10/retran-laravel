<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
	public $timestamps = false;
	protected $fillable = [
		'startdate', 'enddate', 'city', 'county', 'bed', 'bath', 'minsqft', 'maxsqft', 'minlot', 'maxlot', 'units', 'minmls', 'maxmls'
	];
	public function user(){
		return $this->belongsTo(User::class);
	}
}