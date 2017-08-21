<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContractsAddendum extends Model
{
    protected $table = 'contracts_addendum';
    protected $date = ['revised_startdate', 'revised_enddate','revised_date'];
    protected $fillable = [
    	'contract_id',
    	'type',
    	'revised_no',
    	'revised_name',
    	'revised_startdate',
    	'revised_enddate',
    	'revised_date',
    	'currency',
    	'amount',
    	'memo',
    ];

    public function contract()
    {
		return $this->belongsTo('App\Contract','contract_id');
    }

    
}
