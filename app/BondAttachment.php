<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BondAttachment extends Model
{
    $table = 'bond_attachment';

    public function bond()
    {
    	return $tis->belongsTo('App\Bond');
    }

    public function bondsamended()
    {
    	return $tis->belongsTo('App\Bondsamended');
    }
}
