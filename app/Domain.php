<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
	public function ipAddress()
	{
		return $this->belongsTo('App\IpAddress');
    }
}
