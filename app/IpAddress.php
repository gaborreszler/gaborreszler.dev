<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IpAddress extends Model
{
	public function domains()
	{
		return $this->hasMany('App\Domain');
	}

	public static function current()
	{
		return IpAddress::where('is_current', true)->first();
    }
}
