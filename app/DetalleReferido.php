<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleReferido extends Model
{
    //
    protected $fillable = [
      'id_anuncio','id_usuario','costo','tipo'
  	];
  	
}
