<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userpicture extends Model
{
	protected $fillable = ['user_id','picture','picture_name'];
	protected $dates = ['created_at','updated_at'];

	public function picture()
	{
		 return $this->belongsTo('App\User', 'user_id');
	}
}
