<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $table = 'currencies';

    public function contracts()
    {
    	return $this->hasMany('App\Contract', 'cur1', 'id');
    }

}
