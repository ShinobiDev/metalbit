<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Events\NotificacionError;
use App\User;
//Clase para consultar API coinmarketcap
class GuzzleModel extends Model
{
    //
    
    private $url_base="https://api.coinmarketcap.com/v2/";
    private $client;
    
    public function __construct(){
    	$this->client = new \GuzzleHttp\Client();    	
    }
    
    //retorna el listado de monedas
    public function get_response_listings(){
		

        try{
             //dd($this->url_base.'listings/');
                    $res = $this->client->request('GET', $this->url_base.'listings/');
                    //dd($res);
                    if($res->getStatusCode()==200){
                        $js=json_decode($res->getBody());       
                        return json_encode($js->data);
                    }else{
                        return json_encode($js->data);
                        
                    }           
        }catch(\Exception $ex){
              //dd($ex);
              \Log::error($ex);   
              $email=User::join("model_has_roles","users.id","model_has_roles.model_id")
                            ->join("roles","model_has_roles.role_id","roles.id")
                            ->where("roles.name","Admin")
                            ->get();     
              NotificacionError::dispatch($email[0],$ex->getMessage());   
              //return json_encode(["error"=>"Este id de moneda no existe","respuesta"=>false]);
                    
        }
    }
    /*
    consulta de la api
    $limite = "limite de resultados max 100",
    $orden = orden de resultados solo permite id,
    $inicia = numero de inicio de la consulta ,
    $convert = tipo de moneda que quiere convertir
    */ 
    public function get_response_ticker($limite,$orden,$inicia,$convert){
    		
        try{
            $string_add="";
    		
        	if($limite!="null"){
        		$string_add.="?limit=".$limite;
        	}
        	
        	if($orden!="null"){
        		
        		$string_add.="&sort=".$orden;
        		
        		
        	}
        	
        	if($inicia!="null"){
        	
        		$string_add="?start=".$inicia;	
        		if($limite!="null"){
        			$string_add.="&limit=".$limite;
        			if($orden!="null"){
        				$string_add.="&sort=".$orden;		
        			}
        		}

        		
        	}


        	if($convert!="null"){
        		$string_add="?convert=".$convert;
        		if($limite!="null"){
        			$string_add.="&limit=".$limite;
        		}
        	}
        	
        	$res = $this->client->request('GET', $this->url_base.'ticker/'.$string_add);
        	if($res->getStatusCode()==200){
    			$js=json_decode($res->getBody());		
    			return json_encode($js->data);
    		}else{
    			return json_encode($js->data);
    			
    		}

         }catch(\Exception $ex){
              //dd($ex);
              \Log::error($ex);  
              $email=User::join("model_has_roles","users.id","model_has_roles.model_id")
                            ->join("roles","model_has_roles.role_id","roles.id")
                            ->where("roles.name","Admin")
                            ->get();     
              NotificacionError::dispatch($email[0],$ex->getMessage());        
              //return json_encode(["error"=>"Este id de moneda no existe","respuesta"=>false]);
                    
        }
    }
    /*
    consulta de la api para especifica moneda
    $id_cripto_currency = "id de la moneda",
    $convert = "moneda a la que quiere convertir",    
    */
    public function get_specific_currency($id_cripto_currency,$convert){
        try{
    		$string_add="";
    		if($id_cripto_currency!="null"){

        			$string_add=$id_cripto_currency."/";
        			if($convert!="null"){
        				$string_add.="?convert=".$convert;
        			}
        			//echo $this->url_base.'ticker/'.$string_add;
        			$res = $this->client->request('GET', $this->url_base.'ticker/'.$string_add);
            
                    if($res->getStatusCode()==200){
                            //dd($res);
                            $js=json_decode($res->getBody());       
                            return json_encode($js->data);
                    }else if($res->getStatusCode()==404){
                            //dd($res->getStatusCode());
                            return json_encode(["error"=>"Este id de moneda no existe","respuesta"=>false]);
                            
                    }   
            }else{
                            return json_encode(["error"=>"Por favor ingresa un id de la cripto moneda que quieres convertir o consultar","respuesta"=>false]);
            }  
        }catch(\Exception $ex){
              //dd($ex);
              \Log::error($ex); 
              $email=User::join("model_has_roles","users.id","model_has_roles.model_id")
                            ->join("roles","model_has_roles.role_id","roles.id")
                            ->where("roles.name","Admin")
                            ->get();     
              NotificacionError::dispatch($email[0],$ex->getMessage());         
              return json_encode(["error"=>"Ha ocurrido un error en la app","respuesta"=>false]);
                    
        }
	    	

    	
    }
     /*
    consulta de la api para especifica moneda fiduciaria
       
    */
    public function get_fiat_currency(){
        $currency_for_contry=[
                    
                    
                    [

                        "id"=> "33",
                        "Country"=> "Colombian Peso ($)",
                        "Currency"=> "COP"
                    ],
                    [
                        
                        "id"=> "1",
                        "Country"=> " United States dollar ($)",
                        "Currency"=> "USD"
                    ],
                    [
                        "id"=> "2",
                        "Country"=> "Australian dollar ($)",
                        "Currency"=> "AUD"
                    ],
                    [
                        "id"=> "3",
                        "Country"=> "Brazilian real (R$)",
                        "Currency"=> "BRL"
                    ],
                    [
                        "id"=> "4",
                        "Country"=> "Canadian dollar ($)",
                        "Currency"=> "CAD"
                    ],
                    [
                        "id"=> "5",
                        "Country"=> "Swiss franc (Fr)",
                        "Currency"=> "CHF"
                    ],
                    [
                        "id"=> "6",
                        "Country"=> "Chilean peso ($)",
                        "Currency"=> "CLP"
                    ],
                    [
                        "id"=> "7",
                        "Country"=> "Chinese yuan (¥)",
                        "Currency"=> "CNY"
                    ],
                    [
                        "id"=> "8",
                        "Country"=> "Czech koruna (Kč)",
                        "Currency"=> "CZK"
                    ],
                    [
                        "id"=> "9",
                        "Country"=> "Danish krone (kr)",
                        "Currency"=> "DKK"
                    ],
                    [
                        "id"=> "10",
                        "Country"=> "Euro (€)",
                        "Currency"=> "EUR"
                    ],
                    [
                        "id"=> "11",
                        "Country"=> "British pound (£)",
                        "Currency"=> "GBP"
                    ],
                    [
                        "id"=> "12",
                        "Country"=> "Hong Kong dollar ($)",
                        "Currency"=> "HKD"
                    ],
                    [
                        "id"=> "13",
                        "Country"=> "Hungarian forint (Ft)",
                        "Currency"=> "HUF"
                    ],
                    [
                        "id"=> "14",
                        "Country"=> "Indonesian rupiah ( Rp)",
                        "Currency"=> "IDR"
                    ],
                    [
                        "id"=> "15",
                        "Country"=> "Israeli new shekel (₪)",
                        "Currency"=> "ILS"
                    ],
                    [
                        "id"=> "16",
                        "Country"=> "Indian rupee (₹)",
                        "Currency"=> "INR"
                    ],
                    [
                        "id"=> "17",
                        "Country"=> "Japanese yen (¥)",
                        "Currency"=> "JPY"
                    ],
                    [
                        "id"=> "18",
                        "Country"=> "South Korean won (₩)",
                        "Currency"=> "KRW"
                    ],
                    [
                        "id"=> "19",
                        "Country"=> "Mexican peso ($)",
                        "Currency"=> "MXN"
                    ],
                    [
                        "id"=> "20",
                        "Country"=> "Malaysian ringgit (RM)",
                        "Currency"=> "MYR"
                    ],
                    [
                        "id"=> "21",
                        "Country"=> "Norwegian krone (kr)",
                        "Currency"=> "NOK"
                    ],
                    [
                        "id"=> "22",
                        "Country"=> "New Zealand dollar ($)",
                        "Currency"=> "NZD"
                    ],
                    [
                        "id"=> "23",
                        "Country"=> "Philippine piso (₱)",
                        "Currency"=> "PHP"
                    ],
                    [
                        "id"=> "24",
                        "Country"=> "Pakistani rupee (₨)",
                        "Currency"=> "PKR"
                    ],
                    [
                        "id"=> "25",
                        "Country"=> "Polish złoty (zł)",
                        "Currency"=> "PLN"
                    ],
                    [
                        "id"=> "26",
                        "Country"=> "Russian ruble (₽)",
                        "Currency"=> "RUB"
                    ],
                    [
                        "id"=> "27",
                        "Country"=> "Swedish krona (kr)",
                        "Currency"=> "SEK"
                    ],
                    [
                        "id"=> "28",
                        "Country"=> "Singapore dollar ($)",
                        "Currency"=> "SGD"
                    ],
                    [
                        "id"=> "29",
                        "Country"=> "Thai baht (฿)",
                        "Currency"=> "THB"
                    ],
                    [
                        "id"=> "30",
                        "Country"=> "Turkish lira (₺)",
                        "Currency"=> "TRY"
                    ],
                    [
                        "id"=> "31",
                        "Country"=> "New Taiwan dollar ($)",
                        "Currency"=> "TWD"
                    ],
                    [
                        "id"=> "32",
                        "Country"=> "South African rand (R)",
                        "Currency"=> "ZAR"
                    ]
                ];  
        return (object)$currency_for_contry;
    }

}
