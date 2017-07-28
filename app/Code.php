<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    protected $table = 'codes';

    public function employee_status()
    {
    	$this->hasMany('App\EmployeeStatus','code_id','id');
    }

    public function bond(){
    	$this->hasMany('App\Bond', 'Outbound', 'code_id' );
    }

    public function bondtype($code_id)
    {
    	$this->hasMany('App\Bond');
    	return App\Bond::select('codeValue')->where('tableName','bonds')->where('fieldName','type')->wehre('code_id',$code_id)->get();
    }

    public function profile()
    {
        $this->hasMany('App\Profile','codeValue');
    }
}
