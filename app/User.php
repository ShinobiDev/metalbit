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
            case '7':
                $dia_n="DOMINGO";
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
                ['transactionState','Pendiente']
            ])
            ->orwhere([
                ['id_anuncio',$id_anuncio],
                ['id_user_compra',$id_usuario],
                ['code_wallet','']
            ])
            ->orwhere([
                ['id_anuncio',$id_anuncio],
                ['id_user_compra',$id_usuario],
                ['image_wallet','']
            ])
            ->get();
        
        if(count($pg)>0){
          return array("respuesta"=>true,"pago"=>$pg[0]->transactionId);
        }else{
          return array("respuesta"=>false,"pago"=>"0");
        }
    }
}
