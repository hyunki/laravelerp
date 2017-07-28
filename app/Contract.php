<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $fillable = ['contractNo', 'name' , 'code', 'date', 'TotalAmount', 'epAmount', 'cAmount', 'contractor', 'owner', 'country','cur1', 'cur2', 'cur3' ,'file_name'];

    public function curr1()
    {
    	return $this->belongsTo('App\Currency', 'cur1', 'id');
    }

    public function curr2()
    {
        return $this->belongsTo('App\Currency', 'cur2', 'id');
    }
    
    public function curr3()
    {
        return $this->belongsTo('App\Currency', 'cur3', 'id');
    }

    
	public function countries()
    {
    	return $this->belongsTo('App\Country','country','alpha3');
    }

    public function bonds()
    {
        return $this->hasMany('App\Bond', 'contract_id', 'id');
    }

    public static function findCurrency($id)
    {
        if (!$id)
        {
            echo "no id inserted";
        } 
        else 
        {
            return App\Currency::where('id',$id)->select('code')->get();    
        }
        
    }

    public function ContractAddendum()
    {
        return $this->hasMany('App\ContractAddendum');
    }
}
