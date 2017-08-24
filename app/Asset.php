<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $table = 'assets';

    protected $fillable = [
    	'businessplace_id',
    	'category_id',
    	'name',
    	'model_id',
    	'serial',
    	'asset_tag',
    	'assigned_to',
    	'status_id',
    	'purchase_price',
    	'purchase_date',
    	'supplier',
    	'last_checkout',
    	'warranty_month',
    	'depreciate',
    	'memo',
    	'file_path'
    ];

    protected $date = [
    	'purchase_date',
    	'last_checkout',
    ];


    public function assetMaintenance()
    {
    	$this->hasMany('AppAssetMaintenance');
    }
}
