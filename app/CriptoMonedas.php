<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CriptoMonedas extends Model
{
    //
     protected $fillable = [
      'id_moneda','nombre_moneda','precio_moneda'
  	];
}
