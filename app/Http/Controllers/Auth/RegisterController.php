<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Recargas;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Events\UserWasCreated;
use Illuminate\Support\Facades\Auth;
use DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {



        return Validator::make($data, [
            'name' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'phone'=>'required'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        //dd($data['codigo_referido']);
        
        $referente=User::where('codigo_referido',$data['codigo_referido'])->get();    
        $data['password'] = str_random(8);
        $cod=User::select("codigo_referido")->orderBy("codigo_referido","DESC")->limit(1)->get();
        //dd($cod[0]->codigo_referido);
        //dd(((int)$cod[0]->codigo_referido+1));
        $u = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'phone'=>$data['phone'],
            'costo_clic'=>"300",
            'codigo_referido'=>((int)$cod[0]->codigo_referido+1),
            'calificacion'=>'3',
            'num_calificaciones'=>'1'
        ]);
         $u->assignRole('Comerciante');
         DB::table('detalle_horario_usuario')->insert([                                       
                                         [
                                            'id_user'=>$u->id,
                                            'dia'=>'LUNES',
                                            'horario'=>'08:00|17:00',
                                            'estado_dia'=>'Abierto'


                                        ],
                                        [
                                            'id_user'=>$u->id,
                                            'dia'=>'MARTES',
                                            'horario'=>'08:00|17:00',
                                            'estado_dia'=>'Abierto'

                                        ],
                                        [
                                            'id_user'=>$u->id,
                                            'dia'=>'MIERCOLES',
                                            'horario'=>'08:00|17:00',
                                            'estado_dia'=>'Abierto'

                                        ]
                                        ,
                                        [
                                            'id_user'=>$u->id,
                                            'dia'=>'JUEVES',
                                            'horario'=>'08:00|17:00',
                                            'estado_dia'=>'Abierto'


                                        ],
                                        [
                                            'id_user'=>$u->id,
                                            'dia'=>'VIERNES',
                                            'horario'=>'08:00|17:00',
                                            'estado_dia'=>'Abierto'

                                        ],
                                        [
                                            'id_user'=>$u->id,
                                            'dia'=>'SABADO',
                                            'horario'=>'08:00|17:00',
                                            'estado_dia'=>'Cerrado'


                                        ],
                                        [
                                            'id_user'=>$u->id,
                                            'dia'=>'DOMINGO',
                                            'horario'=>'08:00|17:00',
                                            'estado_dia'=>'Cerrado'

                                        ]
                                    ]);
        if(count($referente)>0){


          //Enviar Emial            
            DB::table("detalle_recargas")->insert([
                                                'id_user' => $referente[0]->id,
                                                'valor_recarga'=>100,
                                                "referencia_pago"=>time().$u->id,
                                                 "referencia_pago_pay_u"=>time().$u->id,
                                                 "metodo_pago"=>"BONIFICACION REGISTRO REFERIDO ",
                                                 "tipo_recarga"=>"BONIFICACION"
                                                    ]
                                            );
            DB::table("detalle_referidos")->insert([
                                                'id_referido' => $referente[0]->id,
                                                'id_quien_refiere'=>$u->id
                                                    ]);  
            $dt_r=DB::table('detalle_referidos')->where([['id_referido',$referente[0]->id],['id_quien_refiere',$u->id]])->get();    

            DB::table('bonificaciones')->insert(
                                     ["tipo_bonificacion"=>"REGISTRO",
                                      "fk_id_detalle_referido"=>$dt_r[0]->id,
                                      "valor"=>100   ]);

            Recargas::where("user_id",$referente[0]->id)->increment("valor",100);

        }

        UserWasCreated::dispatch($u, $data['password']);

        //Regrar al usuario

        Recargas::create(["status"=>"ACTIVA","valor"=>"0","user_id"=>$u->id]);


       return $u;



    }

    public function create_landing($codigo_referido){
        $u=User::where("codigo_referido",$codigo_referido)->limit(1)->get();
        if(count($u)>0){
            return view("admin.user.create_landing")
                ->with("codigo_referido",$codigo_referido)
                ->with("user",$u[0]);
        }else{
            return view("home");
                
        }
        
    }
}
