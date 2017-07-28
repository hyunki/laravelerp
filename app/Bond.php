<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bond extends Model
{
	protected $fillable = [

        'Issuer' ,
        'Category' ,
        'Format' ,
        'Outbound' ,
        'Method',
        'Beneficiary' ,
        'LgNumber',
        'Type' ,
        'BondCurrency',
        'Amount' ,
        'FeeCurrency' ,
        'Fee',
        'IssuingDate' ,
        'StartingDate' ,
        'EndingDate',
        'RetrievalDate' ,
        'Status' ,
        'Validity' ,
        'Memo' ,
	];
    protected $dates = ['IssuingDate', 'StartingDate', 'EndingDate', 'RetrievalDate'];

    public function contract()
    {
    	return $this->belongsTo('App\Contract', 'contract_id', 'id');
    }


    public function amended()
    {
        return $this->hasMany('App\Bondsamended', 'bond_id', 'id' );
    }
}
