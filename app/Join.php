<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Join extends Model
{
	protected $table = 'employee_join';
    protected $fillable = [
    	'employee_id',
        'joined_at',
        'resigned_at',
        'resign_reason',
        'employment_contract',
        'resignation',
    ];

    public function employee()
    {
    	return $this->belongsto('App\Employee');
    }
}
