<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';

    public function contracts()
    {
    	return $this->hasMany('App\Contract','alpha3','country');
    }

}
