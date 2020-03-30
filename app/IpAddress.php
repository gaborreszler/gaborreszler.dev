<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IpAddress extends Model
{
	public function domains()
	{
		return $this->hasMany('App\Domain');
	}
}
