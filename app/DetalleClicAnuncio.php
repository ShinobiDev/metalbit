<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleClicAnuncio extends Model
{
    //
      protected $fillable = [
      'id_anuncio','id_usuario','costo','tipo','updated_at'
  	];
}
