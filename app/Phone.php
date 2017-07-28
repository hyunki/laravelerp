<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $table = 'phones';
    protected $fillable = ['country_code','area_code','exchange','station','extension'];

    public function employee()
    {
    	return $this->hasMany('App\Employee');
    }

    public function employees()
    {
    	return $this->belongsToMany('App\Employee','employee_phone','id','phone_id');
    }


}
