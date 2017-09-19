<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
	public $timestamps = false;
	protected $fillable = ['count2'];
	public function user(){
		return $this->belongsTo(User::class);
	}
}