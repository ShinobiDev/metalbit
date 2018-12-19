<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//Clase para manejo de la clase Compras
class ComprasModel extends Model
{
    //
    protected $fillable = [
      'ubicar','postal_code','locality','administrative_area_level_1','country', 'moneda','cripto','banco','margen','limite_max','limite_min','lugar','terminos','user_id',
  	];
}
