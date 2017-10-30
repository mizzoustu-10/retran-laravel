<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
	public $timestamps = false;
	protected $fillable = ['options'];
	public function user(){
		return $this->belongsTo(User::class);
	}
}