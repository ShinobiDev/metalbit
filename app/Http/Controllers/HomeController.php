<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VentasModel;
use App\ComprasModel;
use App\GuzzleModel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
         
         $postsventas = VentasModel::all();
         $guzzle=new GuzzleModel();
         $coinmarketcap=$guzzle->get_response_listings();
         $postsventas = VentasModel::all();
         $v=0;
         foreach ($postsventas as $key => $value) {
           //var_dump($value->terminos);
            //var_dump($value->cripto);
          if($value->moneda!=null && $value->cripto!=null){
            //consulto la api para obteenr valores
            $vv=$guzzle->get_specific_currency($value->cripto,$value->moneda);
            $jsvv=json_decode($vv);
            $arr=(array)$jsvv->quotes;
            $ventas[$v++]=(object)["banco"=>$value->banco,"ubicar"=>$value->ubicar,"precio_moneda"=>number_format($arr[$value->moneda]->price*$value->margen,2,',', '.'),"cripto_moneda"=>$jsvv->name,"moneda"=>$value->moneda,"limite_min"=>$value->limite_min,"limite_max"=>$value->limite_max,"terminos"=>$value->terminos,"lugar"=>$value->lugar] ;
          }
           
         }
         //dd((object)$ventas);
         $postscompras = ComprasModel::all();
         $c=0;
         foreach ($postscompras as $key => $value) {
            //var_dump($value->moneda);
            //var_dump($value->cripto);
          if($value->moneda!=null && $value->cripto!=null){
            //consulto la api para obteenr valores
            $cc=$guzzle->get_specific_currency($value->cripto,$value->moneda);
            $jscc=json_decode($cc);
            $arr=(array)$jscc->quotes;
            $compras[$c++]=(object)["banco"=>$value->banco,"ubicar"=>$value->ubicar,"precio_moneda"=>number_format($arr[$value->moneda]->price*$value->margen,2,',', '.'),"cripto_moneda"=>$jsvv->name,"moneda"=>$value->moneda,"limite_min"=>$value->limite_min,"limite_max"=>$value->limite_max,"terminos"=>$value->terminos,"lugar"=>$value->lugar] ;
          }
           
         } 
       
       // return view('welcome')->with('postsventas',$ventas)->with('postscompras', $compras);
        
    }
}
