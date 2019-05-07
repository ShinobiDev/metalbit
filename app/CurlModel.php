<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Events\NotificacionError;
use App\User;
use App\Variable;
//Clase para consultar API coinmarketcap
class CurlModel extends Model
{
	private $url_base="https://sandbox.coinmarketcap.com/";
    private $client;
    private $key_coin;
    private $curl; 


    public function __construct(){
    	if(Variable::where('nombre','coinmarketkey')->select('valor')->first()!=null){
            $this->key_coin=Variable::where('nombre','coinmarketkey')->select('valor')->first()->valor;
            if(config('app.debug')==false){
                $this->url_base="https://pro-api.coinmarketcap.com/";
            }       
        }else{
            dd("key to coinmarket don't exist");
        }
    	
    }
    
    private function start_curl($direccion,$parameters){
                    
                $url = $this->url_base.$direccion;    
                $key="73013bbc-c7f1-494e-81c6-97f7bbd64ecd";


                $headers = [
                  'Accepts: application/json',
                  'X-CMC_PRO_API_KEY: '.$key
                ];

                $qs = http_build_query($parameters); // query string encode the parameters
                $request = "{$url}?{$qs}"; // create the request URL
                
                curl_setopt_array($this->curl, array(
                  CURLOPT_URL => $request,            // set the request URL
                  CURLOPT_HTTPHEADER => $headers,     // set the headers 
                  CURLOPT_RETURNTRANSFER => 1         // ask for raw response instead of bool
                ));
                // Send the request, save the response
                return curl_exec($this->curl); 
                    
    }
    private function finish_curl(){
        curl_close($this->curl);
    }
    /**
     * [get_response_listings fucnion que consulta el listado de todas las monedas que contien coinmarket]
     * @return [type] [description]
     */
    public function get_response_listings(){
		

        try{
                $url = 'v1/cryptocurrency/listings/latest';

                $parameters = [
                  'start' => '1',
                  'limit' => '5',
                  'convert' => 'COP'
                ];


                $this->curl = curl_init(); // Get cURL resource
                // Set cURL options

                $response=$this->start_curl($url,$parameters);


                return json_decode($response); // print json decoded response
                $this->finish_curl(); // Close request

                   
        }catch(\Exception $ex){
              
              \Log::error($ex);   
              $email=User::join("model_has_roles","users.id","model_has_roles.model_id")
                            ->join("roles","model_has_roles.role_id","roles.id")
                            ->where("roles.name","Admin")
                            ->get();     
              NotificacionError::dispatch($email[0],$ex->getMessage());   
              //return json_encode(["error"=>"Este id de moneda no existe","respuesta"=>false]);
                    
        }
    }
    
    public function get_response_listings_cache(){
        

        try{
                $url = 'v1/cryptocurrency/listings/latest';

                $parameters = [
                  'start' => '1',
                  'limit' => '5',
                  'convert' => 'COP'
                ];


                $this->curl = curl_init(); // Get cURL resource
                // Set cURL options

                $response=$this->start_curl($url,$parameters);


                return json_decode($response); // print json decoded response
                $this->finish_curl(); // Close request

                   
        }catch(\Exception $ex){
              
              \Log::error($ex);   
              $email=User::join("model_has_roles","users.id","model_has_roles.model_id")
                            ->join("roles","model_has_roles.role_id","roles.id")
                            ->where("roles.name","Admin")
                            ->get();     
              NotificacionError::dispatch($email[0],$ex->getMessage());   
              //return json_encode(["error"=>"Este id de moneda no existe","respuesta"=>false]);
                    
        }
    }
   /**
    * [get_response_ticker consulta de la api de coinmarket]
    * @param  [int] $limite  [imite de resultados max 100]
    * @param  [string] $orden   [orden de resultados solo permite id]
    * @param  [int] $inicia  [numero de inicio de la consulta]
    * @param  [string] $convert [ipo de moneda que quiere convertir]
    * @return [json_encode]          [description]
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
 
   /**
    * [get_specific_currency consulta de la api para especifica moneda]
    * @param  [int] $id_cripto_currency [id de la moneda]
    * @param  [string] $convert            [moneda a la que quiere convertir]
    * @return [json_encode]                     [valores especificos para la moneda solitada]
    */
    public function get_specific_currency($id_cripto_currency,$convert){
        try{
            $string_add="";
    		if($id_cripto_currency!="null"){
                $url = 'v1/cryptocurrency/quotes/latest';

                $parameters = [
                  "id"=>$id_cripto_currency,
                  "convert"=>$convert
                ];
                


                $this->curl = curl_init(); // Get cURL resource
                // Set cURL options

                $response=json_decode($this->start_curl($url,$parameters));
                
                if($response->status->error_code==0){
                    $r=(array)$response->data; 
                    
                    return $r[$id_cripto_currency];
                }else{
                    dd($coins["status"]->error_message);
                }

                
                $this->finish_curl(); // Close request
        			
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
   
   /**
    * [get_fiat_currency     consulta de la api para especifica moneda fiduciaria]
    * @return [array] [arreglo con las divisas permitidas]
    */
    public function get_fiat_currency(){
        $currency_for_contry=[     
                    ["id"=>"2820","Country"=>"Colombian Peso ($)","Currency"=>"COP"],               
                    ["id"=>"2781","Country"=>"United States Dollar ($)","Currency"=>"USD"],
					["id"=>"3526","Country"=>"Albanian Lek (L)","Currency"=>"ALL"],
					["id"=>"3537","Country"=>"Algerian Dinar (د.ج)","Currency"=>"DZD"],
					["id"=>"2821","Country"=>"Argentine Peso ($)","Currency"=>"ARS"],
					["id"=>"3527","Country"=>"Armenian Dram (֏)","Currency"=>"AMD"],
					["id"=>"2782","Country"=>"Australian Dollar ($)","Currency"=>"AUD"],
					["id"=>"3528","Country"=>"Azerbaijani Manat (₼)","Currency"=>"AZN"],
					["id"=>"3531","Country"=>"Bahraini Dinar (.د.ب)","Currency"=>"BHD"],
					["id"=>"3530","Country"=>"Bangladeshi Taka (৳)","Currency"=>"BDT"],
					["id"=>"3533","Country"=>"Belarusian Ruble (Br)","Currency"=>"BYN"],
					["id"=>"3532","Country"=>"Bermudan Dollar ($)","Currency"=>"BMD"],
					["id"=>"2832","Country"=>"Bolivian Boliviano (Bs.)","Currency"=>"BOB"],
					["id"=>"3529","Country"=>"Bosnia-Herzegovina Convertible Mark (KM)","Currency"=>"BAM"],
					["id"=>"2783","Country"=>"Brazilian Real (R$)","Currency"=>"BRL"],
					["id"=>"2814","Country"=>"Bulgarian Lev (лв)","Currency"=>"BGN"],
					["id"=>"3549","Country"=>"Cambodian Riel (៛)","Currency"=>"KHR"],
					["id"=>"2784","Country"=>"Canadian Dollar ($)","Currency"=>"CAD"],
					["id"=>"2786","Country"=>"Chilean Peso ($)","Currency"=>"CLP"],
					["id"=>"2787","Country"=>"Chinese Yuan (¥)","Currency"=>"CNY"],
					["id"=>"3534","Country"=>"Costa Rican Colón (₡)","Currency"=>"CRC"],
					["id"=>"2815","Country"=>"Croatian Kuna (kn)","Currency"=>"HRK"],
					["id"=>"3535","Country"=>"Cuban Peso ($)","Currency"=>"CUP"],
					["id"=>"2788","Country"=>"Czech Koruna (Kč)","Currency"=>"CZK"],
					["id"=>"2789","Country"=>"Danish Krone (kr)","Currency"=>"DKK"],
					["id"=>"3536","Country"=>"Dominican Peso ($)","Currency"=>"DOP"],
					["id"=>"3538","Country"=>"Egyptian Pound (£)","Currency"=>"EGP"],
					["id"=>"2790","Country"=>"Euro (€)","Currency"=>"EUR"],
					["id"=>"3539","Country"=>"Georgian Lari (₾)","Currency"=>"GEL"],
					["id"=>"3540","Country"=>"Ghanaian Cedi (₵)","Currency"=>"GHS"],
					["id"=>"3541","Country"=>"Guatemalan Quetzal (Q)","Currency"=>"GTQ"],
					["id"=>"3542","Country"=>"Honduran Lempira (L)","Currency"=>"HNL"],
					["id"=>"2792","Country"=>"Hong Kong Dollar ($)","Currency"=>"HKD"],
					["id"=>"2793","Country"=>"Hungarian Forint (Ft)","Currency"=>"HUF"],
					["id"=>"2818","Country"=>"Icelandic Króna (kr)","Currency"=>"ISK"],
					["id"=>"2796","Country"=>"Indian Rupee (₹)","Currency"=>"INR"],
					["id"=>"2794","Country"=>"Indonesian Rupiah (Rp)","Currency"=>"IDR"],
					["id"=>"3544","Country"=>"Iranian Rial (﷼)","Currency"=>"IRR"],
					["id"=>"3543","Country"=>"Iraqi Dinar (ع.د)","Currency"=>"IQD"],
					["id"=>"2795","Country"=>"Israeli New Shekel (₪)","Currency"=>"ILS"],
					["id"=>"3545","Country"=>"Jamaican Dollar ($)","Currency"=>"JMD"],
					["id"=>"2797","Country"=>"Japanese Yen (¥)","Currency"=>"JPY"],
					["id"=>"3546","Country"=>"Jordanian Dinar (د.ا)","Currency"=>"JOD"],
					["id"=>"3551","Country"=>"Kazakhstani Tenge (₸)","Currency"=>"KZT"],
					["id"=>"3547","Country"=>"Kenyan Shilling (Sh)","Currency"=>"KES"],
					["id"=>"3550","Country"=>"Kuwaiti Dinar (د.ك)","Currency"=>"KWD"],
					["id"=>"3548","Country"=>"Kyrgystani Som (с)","Currency"=>"KGS"],
					["id"=>"3552","Country"=>"Lebanese Pound (ل.ل)","Currency"=>"LBP"],
					["id"=>"3556","Country"=>"Macedonian Denar (ден)","Currency"=>"MKD"],
					["id"=>"2800","Country"=>"Malaysian Ringgit (RM)","Currency"=>"MYR"],
					["id"=>"2816","Country"=>"Mauritian Rupee (₨)","Currency"=>"MUR"],
					["id"=>"2799","Country"=>"Mexican Peso ($)","Currency"=>"MXN"],
					["id"=>"3555","Country"=>"Moldovan Leu (L)","Currency"=>"MDL"],
					["id"=>"3558","Country"=>"Mongolian Tugrik (₮)","Currency"=>"MNT"],
					["id"=>"3554","Country"=>"Moroccan Dirham (د.م.)","Currency"=>"MAD"],
					["id"=>"3557","Country"=>"Myanma Kyat (Ks)","Currency"=>"MMK"],
					["id"=>"3559","Country"=>"Namibian Dollar ($)","Currency"=>"NAD"],
					["id"=>"3561","Country"=>"Nepalese Rupee (₨)","Currency"=>"NPR"],
					["id"=>"2811","Country"=>"New Taiwan Dollar ($)","Currency"=>"TWD"],
					["id"=>"2802","Country"=>"New Zealand Dollar ($)","Currency"=>"NZD"],
					["id"=>"3560","Country"=>"Nicaraguan Córdoba (C$)","Currency"=>"NIO"],
					["id"=>"2819","Country"=>"Nigerian Naira (₦)","Currency"=>"NGN"],
					["id"=>"2801","Country"=>"Norwegian Krone (kr)","Currency"=>"NOK"],
					["id"=>"3562","Country"=>"Omani Rial (ر.ع.)","Currency"=>"OMR"],
					["id"=>"2804","Country"=>"Pakistani Rupee (₨)","Currency"=>"PKR"],
					["id"=>"3563","Country"=>"Panamanian Balboa (B/.)","Currency"=>"PAB"],
					["id"=>"2822","Country"=>"Peruvian Sol (S/.)","Currency"=>"PEN"],
					["id"=>"2803","Country"=>"Philippine Peso (₱)","Currency"=>"PHP"],
					["id"=>"2805","Country"=>"Polish Złoty (zł)","Currency"=>"PLN"],
					["id"=>"2791","Country"=>"Pound Sterling (£)","Currency"=>"GBP"],
					["id"=>"3564","Country"=>"Qatari Rial (ر.ق)","Currency"=>"QAR"],
					["id"=>"2817","Country"=>"Romanian Leu (lei)","Currency"=>"RON"],
					["id"=>"2806","Country"=>"Russian Ruble (₽)","Currency"=>"RUB"],
					["id"=>"3566","Country"=>"Saudi Riyal (ر.س)","Currency"=>"SAR"],
					["id"=>"3565","Country"=>"Serbian Dinar (дин.)","Currency"=>"RSD"],
					["id"=>"2808","Country"=>"Singapore Dollar ($)","Currency"=>"SGD"],
					["id"=>"2812","Country"=>"South African Rand (Rs)","Currency"=>"ZAR"],
					["id"=>"2798","Country"=>"South Korean Won (₩)","Currency"=>"KRW"],
					["id"=>"3567","Country"=>"South Sudanese Pound (£)","Currency"=>"SSP"],
					["id"=>"3573","Country"=>"Sovereign Bolivar (Bs.)","Currency"=>"VES"],
					["id"=>"3553","Country"=>"Sri Lankan Rupee (Rs)","Currency"=>"LKR"],
					["id"=>"2807","Country"=>"Swedish Krona ( kr)","Currency"=>"SEK"],
					["id"=>"2785","Country"=>"Swiss Franc (Fr)","Currency"=>"CHF"],
					["id"=>"2809","Country"=>"Thai Baht (฿)","Currency"=>"THB"],
					["id"=>"3569","Country"=>"Trinidad and Tobago Dollar ($)","Currency"=>"TTD"],
					["id"=>"3568","Country"=>"Tunisian Dinar (د.ت)","Currency"=>"TND"],
					["id"=>"2810","Country"=>"Turkish Lira (₺)","Currency"=>"TRY"],
					["id"=>"3570","Country"=>"Ugandan Shilling (Sh)","Currency"=>"UGX"],
					["id"=>"2824","Country"=>"Ukrainian Hryvnia (₴)","Currency"=>"UAH"],
					["id"=>"2813","Country"=>"United Arab Emirates Dirham (د.إ)","Currency"=>"AED"],
					["id"=>"3571","Country"=>"Uruguayan Peso ($)","Currency"=>"UYU"],
					["id"=>"3572","Country"=>"Uzbekistan Som (so'm)","Currency"=>"UZS"],
					["id"=>"2823","Country"=>"Vietnamese Dong (₫)","Currency"=>"VND"]

                    
                ];  
        return (object)$currency_for_contry;
    }
}