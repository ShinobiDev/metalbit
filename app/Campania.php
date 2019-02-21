<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campania extends Model
{
    //
    
	public function cupones()
	{
	    return $this->hasMany('App\CuponesCampania','id_campania','id');
	}
	public function usuario(){
        return $this->belongsTo('App\User','id_user');
    }

   

}
