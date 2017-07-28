<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    protected $table = 'licenses';

    protected $fillable = [
    	'company_id',
        'software_id',
    	'version',
    	'serial',
    	'seats',
    	'license_name',
    	'license_email',
    	'reassignable',
    	'purchase_date',
        'purchase_price',
    	'termination_date',
        'supplier_id',
        'notes',

    ];

}
