<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\CompartirCodigo;
use App\Events\NotificacionAnuncio;
use App\Anuncios;
use App\Recargas;
use App\GuzzleModel;
use App\Payu;
use App\User;
use App\pagos;
use DB;
use Carbon\Carbon;



class AnunciosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $u=auth()->user();

        $anuncios_consultados=array();

        if($u!=null){
            //dd($u->id);
            $uc=User::where("confirmado","SI")->select("id")->get();
            $arr=[];
            $i=0;
            //dd($uc);
            foreach ($uc as $key => $value) {
                if(Auth()->user()->id!=$value->id){
                         $arr[$i++]=$value->id;
                }
            }
        }else{

            $uc=User::where("confirmado","SI")->select("id")->get();

            $arr=[];
            $i=0;
            foreach ($uc as $key => $value) {
                
                    $arr[$i++]=$value->id;
                

            }
        }


         //dd($arr);
        if(count($arr)>0){
           $anuncios_consultados= Anuncios::select("anuncios.id",
                             "anuncios.cod_anuncio",
                             "anuncios.tipo_anuncio",
                             "anuncios.ubicacion",
                             "anuncios.moneda",
                             "anuncios.nombre_moneda",
                             "anuncios.criptomoneda",
                             "anuncios.nombre_cripto_moneda",
                             "anuncios.banco",
                             "anuncios.margen",
                             "anuncios.precio_minimo_moneda",
                             "anuncios.limite_min",
                             "anuncios.limite_max",
                             "anuncios.lugar",  
                             "anuncios.terminos",
                             "anuncios.estado_anuncio",
                             "anuncios.user_id",
                             "anuncios.created_at",
                             "anuncios.created_at",
                             "users.id as id_usuario",
                             "users.name",
                             "users.phone",
                             "users.email",
                             "users.costo_clic",
                             "recargas.valor",
                             DB::Raw("FORMAT(users.calificacion/users.num_calificaciones,1) as calificacion")   )
                        ->join("users","users.id","anuncios.user_id")
                        ->join("recargas","recargas.user_id","users.id")
                        ->whereIn("anuncios.user_id",$arr)
                        ->where("anuncios.estado_anuncio","activo")
                        ->orderBy("recargas.valor","DESC")
                        ->get();
        }   
        $ad_arr=new Anuncios();
        $arr_anuncios = $ad_arr->ver_anuncios($anuncios_consultados);
          
         //dd($arr_anuncios); 
        if(auth()->user()!=null){
            return view('welcome')->with('anuncios',$arr_anuncios)->with("mis_anuncios",false);
        }else{
            return view('welcome')->with('anuncios',$arr_anuncios)->with("mis_anuncios",false);
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

       $this->authorize('create', new Anuncios); 
      //if(auth()->user()!=NULL){
           $coinmarketcap = new GuzzleModel();
           $listacriptos = $coinmarketcap->get_response_listings();
           $listamonedas = $coinmarketcap->get_fiat_currency();
           $response  = $coinmarketcap->get_specific_currency(1,"COP");
           $coins = json_decode($response);
           if(property_exists($coins,"respuesta")==true){
                return redirect('/');
            }else{
              return view('posts.create')
                            ->with('coins',$coins->quotes->COP->price)
                            ->with('listacriptos', (object)json_decode($listacriptos))
                            ->with("listamonedas",$listamonedas)
                            ->with("recarga",Recargas::where("user_id",auth()->user()->id)->select("valor")->first());
            }
           
        /*}else{

           return redirect('/');
        }*/
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->authorize('create', new Anuncios); 
        $data = $request->validate([
          'tipo_anuncio'=>'required',
          'cod_anuncio'=>'',
          'ubicacion' => 'required',
          'moneda' => 'required',
          'nombre_moneda' => '  required',
          'criptomoneda' => 'required',
          'nombre_cripto_moneda' => 'required',
          'margen' => 'required',
          'precio_minimo_moneda'=>'',
          'banco' => 'required',
          'limite_min' => 'required',
          'limite_max' => 'required',
          'lugar' => '',
          'terminos' => 'required',
          'user_id' => 'required',
          'cod_postal'=>'',
          'localidad'=>'',
          'departamento'=>'',
          'ciudad'=>'',

        ]);
        //dd($data);
        if($data['precio_minimo_moneda'] == null && $data['tipo_anuncio'] == "compra"){
            $data['precio_minimo_moneda']=0;
        }else if($data['precio_minimo_moneda'] == null && $data['tipo_anuncio'] == "venta"){
            //$data['precio_minimo_moneda']=0;
        }
        
        if((float)$data['limite_max']>=(float)$data['limite_min']){
            $posts = Anuncios::create(
              [
              'tipo_anuncio'=> $data['tipo_anuncio'],
              'cod_anuncio'=>strtoupper(substr($data['tipo_anuncio'],0,1).$data['criptomoneda']),
              'ubicacion' =>$data['ubicacion'],
              'moneda' => $data['moneda'],
              'nombre_moneda' => $data['nombre_moneda'],
              'criptomoneda' => $data['criptomoneda'],
              'nombre_cripto_moneda' => $data['nombre_cripto_moneda'],
              'margen' => $data['margen'],
              'precio_minimo_moneda'=>$data['precio_minimo_moneda'],
              'banco' => $data['banco'],
              'limite_min' => $data['limite_min'],
              'limite_max' => $data['limite_max'],
              'lugar' => $data['lugar'],
              'terminos' => $data['terminos'],
              'user_id' => $data['user_id'],
              'cod_postal'=>$data['cod_postal'],
              'localidad'=>$data['localidad'],
              'departamento'=>$data['departamento'],
              'ciudad'=>$data['ciudad'],
              'estado_anuncio'=>"activo"
              ]
         );
                //dd($posts);
        $recarga=Recargas::where("user_id",$data['user_id'])->get();
        //dd(Auth()->user()->id);
        //AnuncioWasCreated::dispatch(Auth()->user(), $posts,$recarga[0]->valor);
        NotificacionAnuncio::dispatch(Auth()->user(), $posts,$recarga[0]->valor,"AnuncioCreado");
        $coinmarketcap = new GuzzleModel();
        $listacriptos = $coinmarketcap->get_response_listings();
        $listamonedas = $coinmarketcap->get_fiat_currency();
        $response  = $coinmarketcap->get_specific_currency(1,"COP");
        $coins = json_decode($response);
        return redirect()->route('anuncios.create')
                            ->with('coins',$coins->quotes->COP->price)
                            ->with('listacriptos', (object)json_decode($listacriptos))
                            ->with("listamonedas",$listamonedas)
                            ->with("recarga",Recargas::where("user_id",auth()->user()->id)->select("valor")->first())
                            ->with('success', 'Su anuncio se ha ingresado correctamente');
        }else{
            return redirect()->route('posts.index')->with('error', 'El valor de venta o compra minimo no debe ser menor al valor máximo');
            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('view', new Anuncios); 
        $u=auth()->user();
        $anuncios_consultados=array();
        $uc=User::where("confirmado","SI")->select("id")->get();
        $arr=[];
        $i=0;
        foreach ($uc as $key => $value) {
            if(Auth()->user()->id!=$value->id){
                $arr[$i++]=$value->id;
            }
        }
        if(count($arr)>0){
           $anuncios_consultados= Anuncios::select("anuncios.id",
                             "anuncios.cod_anuncio",
                             "anuncios.tipo_anuncio",
                             "anuncios.ubicacion",
                             "anuncios.moneda",
                             "anuncios.nombre_moneda",
                             "anuncios.criptomoneda",
                             "anuncios.nombre_cripto_moneda",
                             "anuncios.banco",
                             "anuncios.margen",
                             "anuncios.precio_minimo_moneda",
                             "anuncios.limite_min",
                             "anuncios.limite_max",
                             "anuncios.lugar",  
                             "anuncios.terminos",
                             "anuncios.estado_anuncio",
                             "anuncios.user_id",
                             "anuncios.created_at",
                             "anuncios.created_at",
                             "users.id as id_usuario",
                             "users.name",
                             "users.phone",
                             "users.email",
                             "users.costo_clic",
                             "recargas.valor",
                             DB::Raw("FORMAT(users.calificacion/users.num_calificaciones,1) as calificacion")   )
                        ->join("users","users.id","anuncios.user_id")
                        ->join("recargas","recargas.user_id","users.id")
                        ->where("anuncios.user_id",auth()->user()->id)
                        ->get();
        }   
        $ad_arr=new Anuncios();
        //dd($anuncios_consultados);
        $arr_anuncios = $ad_arr->ver_anuncios($anuncios_consultados);
        
        //dd($arr_anuncios);
        return view('welcome')->with('anuncios',$arr_anuncios)->with("mis_anuncios",true);
        
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function all($id)
    {
        //
        
        $this->authorize('update', new Anuncios); 
        $u=auth()->user();

        $anuncios_consultados=array();
        $uc=User::where("confirmado","SI")->select("id")->get();
        $arr=[];
        $i=0;
        foreach ($uc as $key => $value) {
            if(Auth()->user()->id!=$value->id){
                $arr[$i++]=$value->id;
            }
        }
        if(count($arr)>0){
           $anuncios_consultados= Anuncios::select("anuncios.id",
                             "anuncios.cod_anuncio",
                             "anuncios.tipo_anuncio",
                             "anuncios.ubicacion",
                             "anuncios.moneda",
                             "anuncios.nombre_moneda",
                             "anuncios.criptomoneda",
                             "anuncios.nombre_cripto_moneda",
                             "anuncios.banco",
                             "anuncios.margen",
                             "anuncios.precio_minimo_moneda",
                             "anuncios.limite_min",
                             "anuncios.limite_max",
                             "anuncios.lugar",  
                             "anuncios.terminos",
                             "anuncios.estado_anuncio",
                             "anuncios.user_id",
                             "anuncios.created_at",
                             "anuncios.created_at",
                             "users.id as id_usuario",
                             "users.name",
                             "users.phone",
                             "users.email",
                             "users.costo_clic",
                             "recargas.valor",
                             DB::Raw("FORMAT(users.calificacion/users.num_calificaciones,1) as calificacion")   )
                        ->join("users","users.id","anuncios.user_id")
                        ->join("recargas","recargas.user_id","users.id")
                        ->orderBy("recargas.valor","DESC")
                        ->get();
        }   
        $ad_arr=new Anuncios();
        //dd($anuncios_consultados);
        $arr_anuncios = $ad_arr->ver_anuncios($anuncios_consultados);
        
        //dd($arr_anuncios);
        return view('welcome')->with('anuncios',$arr_anuncios)->with("mis_anuncios",true);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    /**
     * Funcion para crear hash del pago en payu para recargas
     * @param  [type] $a [codigo anuncio]
     * @param  [type] $p [valor de la venta]
     * @param  [type] $m [modena para hacer el pago]
     * @return [type]    [description]
     */
    public function hash($a,$p,$m){

         $pu = Payu::all();
         return response()->json(["valor"=>$pu[0]->hashear($a,$p,$m)]);
    }
    /**
     * Funcion para crear hash del pago en payu para anuncios
      * @param  [type] $a [codigo anuncio]
     * @param  [type] $p [valor de la venta]
     * @param  [type] $m [modena para hacer el pago]
     * @param  [type] $id_u [id_usuario]
     * @param  [type] $cantidad [cantidad de monedas]
     * @return [type]       [description]
     */
    public function hash_anuncio($a,$p,$m,$id_u,$cantidad){

         $pu = Payu::all();
         //dd(explode("-",$a)[1]);
         $id_a=explode("-",$a)[1];
         $PG=DB::table('pagos')->where([
                                    ["id_anuncio",$id_a],
                                    ["metodo_pago","PENDIENTE"],
                                    ["id_user_compra",$id_u]
                                ])->get();
         if(count($PG)>0){
            DB::table('pagos')
                         ->where("id",$PG[0]->id)  
                         ->update(["transactionId"=>"-",
                            "transactionQuantity"=>$cantidad,
                            "transactionState"=>0,
                            "transation_value"=>$p,
                            "id_anuncio"=>$id_a,
                            "metodo_pago"=>'PENDIENTE',
                            "id_user_compra"=>$id_u]);
            
            
         }else{
            DB::table('pagos')->insert(["transactionId"=>"-",
                            "transactionQuantity"=>$cantidad,
                            "transactionState"=>0,
                            "transation_value"=>$p,
                            "id_anuncio"=>$id_a,
                            "metodo_pago"=>'PENDIENTE',
                            "id_user_compra"=>$id_u]);
         }

         return response()->json(["valor"=>$pu[0]->hashear($a,$p,$m)]);
    }

    public function obtener_valor_moneda_valida($id_cripto,$moneda){
        $guzzle=new GuzzleModel();
        $vv=$guzzle->get_specific_currency($id_cripto,$moneda);
        return response()->json(json_decode($vv));
    }
    public function cambiar_estado_anuncio($id,$estado){
        $ad=Anuncios::where('id',$id)->get();
        $re=Recargas::where("user_id",Auth()->user()->id)->get();
        if($estado==1){
            $est="activo";
            NotificacionAnuncio::dispatch(Auth()->user(), $ad[0],$re[0]->valor,"AnuncioHabilitado");
        }else{
            $est="inactivo";
            NotificacionAnuncio::dispatch(Auth()->user(), $ad[0],$re[0]->valor,"AnuncioDeshabilitado");
        }
        Anuncios::where("id",$id)->update(["estado_anuncio"=>$est]);
        return response()->json(["respuesta"=>Anuncios::where("id",$id)->select("estado_anuncio")->get()]);
    }
    /**
     * Funcion para calificar al anunciante
     * @param  Request $datos [description]
     * @return [type]         [description]
     */
    public function calificar(Request $datos){
         //dd($datos);
          $data=$datos->validate([
            'nota'=>'required',
            'id_anuncio_calificar'=>'required',
            'sel_opt_calificacion'=>'',
            'opinion'=>'',
            'opinion_otro'=>''
          ]);          
          if($data['sel_opt_calificacion']=="Otros"){
            //$data['sel_opt_calificacion']=$data['opinion_otro'];
          }
          DB::table('detalle_clic_anuncios')
                  ->where('id',$data['id_anuncio_calificar'])
                  ->update(['calificacion'=>$data["nota"],'opinion'=>$data["sel_opt_calificacion"],'comentario'=>$data["opinion"]]);
                  
          $dtc=DB::table('detalle_clic_anuncios')
              ->where('id',$data['id_anuncio_calificar'])
              ->get();
          $an=Anuncios::where("id",$dtc[0]->id_anuncio)->get();
          User::where("id",$an[0]->user_id)->increment("calificacion",$data['nota']);
          User::where("id",$an[0]->user_id)->increment("num_calificaciones",1);
           
          return redirect()->route('anuncios_vistos', auth()->user())->with('success', 'Se ha registrado tu calificación ');             
    }

    /**
     * Funcion para calificar al anunciante
     * @param  Request $datos [description]
     * @return [type]         [description]
     */
    public function calificar_venta(Request $datos){
         //dd($datos);
          $data=$datos->validate([
            'nota'=>'required',
            'id_transaccion'=>'required',
            'sel_opt_calificacion'=>'',
            'opinion'=>'',
            'opinion_otro'=>''
          ]);
          
          if($data['sel_opt_calificacion']=="Otros"){
            //$data['sel_opt_calificacion']=$data['opinion_otro'];
          }
          DB::table('pagos')
                  ->where('id',$data['id_transaccion'])
                  ->update(['calificacion'=>$data["nota"],'opinion'=>$data["sel_opt_calificacion"],'opinion'=>$data["opinion"]]);                  
          $dtc=DB::table('pagos')
              ->where('id',$data['id_transaccion'])
              ->get();
          $an=Anuncios::where("id",$dtc[0]->id_anuncio)->get();
          User::where("id",$an[0]->user_id)->increment("calificacion",$data['nota']);
          User::where("id",$an[0]->user_id)->increment("num_calificaciones",1);           
          return redirect()->route('users.show',auth()->user()->id)->with('success', 'Se ha registrado tu calificación ');             
    }

    /**
     * @param  Request datos enviados desde el servidor
     * @return [type]
     * Funcion para enviar los correos necesarios
     */
    public function compartir_mail(Request $re){
            CompartirCodigo::dispatch(Auth()->user(),$re["correos"]);
            return redirect()->route('users.show', auth()->user())->with('success', 'Se ha enviado tu invitación');    
    }

    public function ver_mas_comentarios($id_anuncio,$min,$max){
        $comentarios=DB::table('detalle_clic_anuncios')
                            ->where('id_anuncio',$id_anuncio)
                            ->join('users','users.id','detalle_clic_anuncios.id_usuario')
                            ->skip($min)
                            ->limit($max)
                            ->get();
        if(count($comentarios)>0){
            foreach ($comentarios as $key => $value) {
                $f=new Carbon($value->updated_at);
                $comentarios[$key]->updated_at=$f->format('M d, Y h:i A');
            }

            return response()->json(["respuesta"=>true,"datos"=>$comentarios]);    
        }else{
            return response()->json(["respuesta"=>false,"datos"=>$comentarios]);
        }                    
    }   

}
