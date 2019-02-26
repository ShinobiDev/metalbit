<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Carbon\Carbon;
use DB;
class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name', 'email','phone', 'password','costo_clic','confirmado','codigo_referido'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($password){

          $this->attributes['password'] = bcrypt($password);

    }


    public function scopeAllowed($query){

        if (auth()->user()->can('view',$this)) {

            return $query;

        }

        return $query->where('id', auth()->id());

    }

    public function getRoleDisplayNames(){

      return $this->roles->pluck('display_name')->implode(', ');
    }
    /**
     * Funcion para consulatr el horario de un usuario
     * @param  [type] $id  [description]
     * @param  [type] $dia [description]
     * @return [type]      [description]
     */
    public function ver_horarios($id,$dia){
        $dia_n="";
        //dd($dia);
        switch ($dia) {
            case '1':
                $dia_n="LUNES";
                break;
            case '2':
                $dia_n="MARTES";
                break;
            case '3':
                $dia_n="MIERCOLES";
                break;
            case '4':
                $dia_n="JUEVES";
                break;    
            case '5':
                $dia_n="VIERNES";
                break;
            case '6':
                $dia_n="SABADO";
                break;
            case '0':
                $dia_n="DOMINGO";
                break;
            default:
                $dia_n="LUNES";
                break;        
        }


        $horarios=DB::table('detalle_horario_usuario')->where([['id_user',$id],['dia',$dia_n]])->get();
        $hora_actual=Carbon::now('America/Bogota');
        $hora=explode("|",$horarios[0]->horario);
        /*dd([
            $hora[0],
            strtotime($hora[0]),
            $hora[1],
            strtotime($hora[1]),
            $hora_actual->format('H:i'),
            strtotime($hora_actual->format('H:i')),
            $horarios[0]->estado_dia
            ]);*/
        //echo "<br>";
        $estado=false;
        //dd(strtotime($hora_actual->format('H:i')) > strtotime($hora[1]));
        if($horarios[0]->estado_dia == "CERRADO"){
           return array("respuesta"=>false,"horario"=>$horarios[0]);

        }

        //var_dump(strtotime($hora_actual->format('H:i')));
        //var_dump(strtotime($hora[0])); 
        if( strtotime($hora_actual->format('H:i'))  < strtotime($hora[0])  ){
               return array("respuesta"=>false,"horario"=>$horarios[0]);
        }

        if( strtotime($hora_actual->format('H:i')) > strtotime($hora[1])    ){
                return array("respuesta"=>false,"horario"=>$horarios[0]);
        }



        return array("respuesta"=>true,"horario"=>$horarios[0]);
    }
    /**
     * Funcion para consultar si usuario tiene compra pendiente
     * @param  [type] $id_anuncio [description]
     * @param  [type] $id_usuario [description]
     * @return [type]             [description]
     */
    public function compra_pendiente($id_anuncio,$id_usuario){
        $pg=pagos::where([
                ['id_anuncio',$id_anuncio],
                ['id_user_compra',$id_usuario],
                //['code_wallet','!=','SIN REGISTRAR'],
                ['transactionState','Pendiente'],
                //['pagos.transactionId','!=',null]
            ])
            ->orwhere([
                ['id_anuncio',$id_anuncio],
                ['id_user_compra',$id_usuario],
                //['image_wallet','!=','SIN REGISTRAR'],
                ['transactionState','Visto'],
                //['pagos.transactionId','!=',null]
            ])
            ->get();
        //dd($pg);
        if(count($pg)>0){
          //dd($pg[0]);   
          //dd($pg);   
          return array("respuesta"=>true,
                        "pago"=>$pg[0]->transactionId,
                        "wallet"=>$pg[0]->code_wallet,
                        'wallet_qr'=>$pg[0]->image_wallet,
                        'quantity'=>$pg[0]->transactionQuantity,
                        'value'=>$pg[0]->transation_value,
                        'state'=>$pg[0]->transactionState);
        }else{
          return array("respuesta"=>false,
                      "pago"=>"0",
                      "wallet"=>"",
                      'wallet_qr'=>'0',
                      'quantity'=>'0',
                      'value'=>'0',                      
                      'state'=>0);
        }
    }
    public function registrar_recarga($id,$valor_recarga,$referencia_pago,$valor_pagado){
        $dt=detalle_recargas::where([
                                      ["id_user",$id],
                                      ["estado_detalle_recarga","REGISTRADA"]
                                    ])
                                 ->get();


        $pp=new Payu;
        $hs=$pp->hashear($referencia_pago,$valor_pagado,"COP");                                 
        if(count($dt)==0){
            detalle_recargas::insert([
                    'tipo_recarga' => "PAGO",
                    'valor_recarga'=>$valor_recarga,
                    'valor_pagado'=>$valor_pagado,
                    'referencia_pago'=>$referencia_pago,
                    'id_user'=>$id
                ]);
    
        }else{
          detalle_recargas::where([
                                      ["id_user",$id],
                                      ["estado_detalle_recarga","REGISTRADA"]
                                      
                                    ])
                                  ->update([
                                        "referencia_pago"=>$referencia_pago,
                                        "valor_pagado"=>$valor_pagado,
                                        'valor_recarga'=>$valor_recarga,

                                      ]);
        }
        
        return response()->json(["respuesta"=>true,'hash'=>$hs]);
        
    }
    /**
     * Funcion para crear hash del pago en payu para anuncios
      * @param  [type] $a [codigo anuncio]
     * @param  [type] $p [valor de la venta]
     * @param  [type] $m [moneda para hacer el pago]
     * @param  [type] $id_u [id_usuario]
     * @param  [type] $cantidad [cantidad de monedas]
     * @return [type]       [description]
     */
    public function registrar_venta($a,$p,$m,$id_u,$cantidad){
        $pu = Payu::all();
         //dd(explode("-",$a)[1]);
         $id_a=explode("-",$a);
         if(count($id_a)>1){
          $id_a=explode("-",$a)[1];
         }else{
          $id_a=$a;
         }
         $PG=DB::table('pagos')->where([
                                    ["id_anuncio",$id_a],
                                    ["transactionState","Pendiente"],
                                    ["id_user_compra",$id_u]
                                ])
                                ->orwhere([
                                    ["id_anuncio",$id_a],
                                    ["transactionState","Visto"],
                                    ["id_user_compra",$id_u]
                                ])
                                ->get();
          //dd($PG);                                
         if(count($PG)>0){
            //dd($PG);
            DB::table('pagos')
                         ->where("id",$PG[0]->id)  
                         ->update([
                            "transactionQuantity"=>$cantidad,
                            "transation_value"=>$p,
                            "metodo_pago"=>'PENDIENTE',
                            'updated_at'=>Carbon::now('America/Bogota')
                            ]);
            
            
         }
         //dd($a,$p,$m,$id_u,$cantidad);
         return response()->json(['respuesta'=>true,"valor"=>$pu[0]->hashear($a,$p,$m)]);
        
    }
}
