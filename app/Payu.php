<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payu extends Model
{
    //
    protected $fillable = [
      'API_KEY','merchantId','accountId','urlResponse','urlConfirm', 'urlApi','urlError','type_encrypt',
      'razon_social','nit','tel_contacto'
  	];

  	public function hashear($ref_pago,$monto,$moneda){
  			$val=0;
        if(config("app.debug")==true){
          $tipo="TEST";
        }else{
          $tipo="PRODUCTION";
        }
  			$da=$this::Where("type",$tipo)->get();
        
        $DATA=trim($da[0]->API_KEY."~".$da[0]->merchantId."~".$ref_pago."~".$monto."~".$moneda);	
  			
        switch ($da[0]->type_encrypt) {
  				case 'MD5':
  					$val = md5($DATA);
  					break;
  				case 'SHA1':
  					$val = sha1($DATA);
  					break;
  				case 'SHA256':
  					$val = hash("sha256",$DATA);
  					break;
  				default:
  					# code...
  					break;
  			}
  		 	
  			//echo $da[0]->type_encrypt."<BR>";
  		  //echo $DATA."</br>";
        //echo $val."<BR>";
        //echo $tipo."<BR>";

  			return  $val;
  	}
}
