<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Code as Code;

class Employee extends Model
{
    protected $table = 'employees';

    protected $fillable = ['lastName','firstName','idNumber'];

    public function profiles()
    {
    	return $this->hasMany('App\Profile');
    }

    public function joins()
    {
    	return $this->hasMany('App\Join');
    }

    public function contacts()
    {
    	return $this->belongsToMany('App\Contacts');
    }

    public function phones()
    {
    	return $this->belongsToMany('App\Phone','employee_phone','id','employee_id');
    }

    

}
