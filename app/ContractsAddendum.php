<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContractsAddendum extends Model
{
    $table = 'contracts_addendum';

    public function contract()
    {
		return $this->belongsTo('App\Contracts','contract_id');
		
    }
}
