<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profiles';
    protected $fillable =[
		'employee_id',
		'businessPlace',
		'dutyPlace',
		'department',
		'title',
		'position'
    ];

    public function employee()
    {
    	return $this->belongsTo('App\Employee');
    }

    public function codes()
    {
        return $this->belongsTo('App\Code','code_id');
    }
}
