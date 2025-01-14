<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
	use HasFactory;

    protected $guarded = [];
	
	public function user()
	{
		return $this->belongsTo(User::class);
	}
	
	public function restaurant()
	{
		return $this->belongsTo(Restaurant::class);
	}
}
