<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bondsamended extends Model
{
    public function bond()
    {
    	return $this->belongsTo('App\Bonds', 'contract_id', 'id');
    }
}
