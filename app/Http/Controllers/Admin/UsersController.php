<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Events\UserWasCreated;
use App\Events\ActualizacionDatos;
use App\Events\NotificacionAnuncio;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use Spatie\Permission\Models\Permission;
use Illuminate\Routing\Redirector;
use App\Recargas;
use App\Payu;
use App\Anuncios;
use App\Variable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Hash;
use App\pagos;





class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $users = User::allowed()->get();
       $horarios=DB::table('detalle_horario_usuario')->where('id_user',auth()->user()->id)->get();

       return view('admin.user.index')
                        ->with('users', $users)
                        ->with('horarios',$horarios)
                        ->with("recarga",Recargas::where("user_id",auth()->user()->id)->select("valor")
                        ->first());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {



        $user = new User;

        $this->authorize('create', $user);

        $roles = Role::with('permissions')->get();
        $permissions = Permission::pluck('name','id');
        return view('admin.user.create',compact('user', 'roles','permissions'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
    {
        //Validar usuario

        $this->authorize('create', new User);


        $data = $request->validate([
          'name' => 'required|string|max:255',
          'email' => 'required|string|email|max:255|unique:users',
           'phone'=> 'required',
           'código_referido'=>''
        ]);
        //Generar contrarseña
        $u=User::select("codigo_referido")->orderBy("codigo_referido","DESC")->limit(1)->get();
        //dd($u->codigo_referido);
        $data['password'] = str_random(8);
        $data['costo_clic'] = 300;
        $data['codigo_referido'] = ((int)$u[0]->codigo_referido+1);

        //Crear usuario
        //dd($data);
        $user = User::create($data);
        //Asignar roles
        if ($request->filled('roles')) {

          $user->assignRole($request->roles);

        }

        //Asignar Permisos
        if ($request->filled('permissions')) {

            $user->givePermissionTo($request->permissions);

        }


       //Enviar Emial

        UserWasCreated::dispatch($user, $data['password']);



        return redirect()->route('users.index')->with('success','Se ha creado el usuario correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

          $this->authorize('view', $user);

          $recargas = Recargas::where('user_id',$user->id)->get();
          // dd($recargas);
          //dd(Payu::all());
          $pp=new Payu();
            if(config("app.debug")==true){
              $tipo="TEST";
            }else{
              $tipo="PRODUCTION";
            }
          $py=Payu::where("type",$tipo)->get();
          $ref=time()."-".date("s");
          $ad=[];
          $ref=time()."-".date("s");
          $ad=[];


           $ad=DB::table('detalle_clic_anuncios')
                            ->select('anuncios.tipo_anuncio','anuncios.nombre_cripto_moneda','anuncios.nombre_moneda','anuncios.id','anuncios.criptomoneda','anuncios.user_id','detalle_clic_anuncios.tipo',DB::raw('count(detalle_clic_anuncios.id_anuncio) as print_ad'))
                            ->join('anuncios','detalle_clic_anuncios.id_anuncio','anuncios.id')
                            ->where('anuncios.user_id',$user->id)
                            ->orderBy('print_ad',"DESC")
                            ->groupBy('detalle_clic_anuncios.id_anuncio')
                            ->groupBy('detalle_clic_anuncios.tipo')
                            ->limit(5)
                            ->get();

          $transacciones=DB::table('pagos')
                                ->select("pagos.id","users.name","users.phone","users.email","anuncios.tipo_anuncio","anuncios.nombre_cripto_moneda","pagos.calificacion","pagos.transactionQuantity","pagos.transactionId")
                                ->join("anuncios","anuncios.id","pagos.id_anuncio")
                                ->join("users","users.id","anuncios.user_id")
                                ->where([["pagos.id_user_compra",auth()->user()->id],['estado_pago','<>','RECHAZADA']])
                                ->orderBy('pagos.calificacion','ASC')
                                ->get();

          $horarios=DB::table('detalle_horario_usuario')->where('id_user',auth()->user()->id)->get();

          $pendiente=DB::table('detalle_recargas')->where([['id_user',auth()->user()->id],['estado_detalle_recarga','PENDIENTE']])->first();
        

          //dd($transacciones);
          return view('admin.user.show')->with('user', $user)
                    ->with('recargas', $recargas)
                    ->with("py",$py[0])
                    ->with("ref_code","rec_".$ref)
                    ->with("hash",$pp->hashear("rec_".$ref,20000,"COP"))
                    ->with("ad",$ad)
                    ->with("transacciones",$transacciones)
                    ->with("variables",Variable::where('nombre','porcentaje_tramite')->get())
                    ->with('recarga_pendiente',$pendiente)
                    ->with('horarios',$horarios);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        $this->authorize('update', $user);

        $roles = Role::with('permissions')->get();
        $permissions = Permission::pluck('name','id');
        $horarios=DB::table('detalle_horario_usuario')->where('id_user',$user->id)->get();
        return view('admin.user.edit',compact('user', 'roles','permissions'))->with("horarios",$horarios);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // public function confirma(Request $request, User $user){
    //
    //     $usr = User::where('email', $request->mail);
    //     foreach ($usrs as $us) {
    //       $clave = $us->password;
    //     }
    //
    //     $confirmas =  Hash::make($request->confirma);
    //     dd($confirmas);
    //     if ($request->confirmas == $clave) {
    //       // code...
    //     }
    //
    // }


    public function update(UpdateUserRequest $request, User $user)
    {



        $this->authorize('Update', $user);

        //consulto el uusario para validar si el email es igual
        $uo=User::where("id",$user->id)->get();

        if($uo[0]->email!=$request["email"]){

            $msn="Hemos enviado un correo electrónico, a tu cuenta ".$request["email"].", por favor confirmalo para realizar los cambios de tu correo";
            $data=$request->validated();
            if(strlen($data['phone']) < 7 ||  strlen($data['phone']) > 13){
                $msn="Ingresa un número de télefono valido";
                return back()->with('error',$msn);
            }
            $arr["name"]=$data["name"];
            $arr["phone"]=$data["phone"];
            $arr["cuenta_bancaria"]=$data["cuenta_bancaria"];
            //valido si el usuario envio una nueva contrasela y en caso de esto la cambio
            if(array_key_exists("password", $data)){
                $arr["password"]=bcrypt($data["password"]);


                User::where("id",$user->id)->update([
                                                  'password'=>bcrypt($data['password'])
                                                    ]);
            }
            //valido que la cuenta de correo electronico sea valida
            if(filter_var($request["email"], FILTER_VALIDATE_EMAIL)){
                //consulto que no exista esta cuenta de correo registrada
                $uu=User::where("email",$request["email"])->get();
                if(count($uu)==0){

                    ActualizacionDatos::dispatch($user,$request["email"]);
                }else{
                    $msn="No se ha podido registrar la cuenta de correo ".$request["email"].", está cuenta de correo, ya se encuentra registrada en nuestro sistema ";
                }

            }else{
                $msn="Ingresa una cuenta de correo valida";
            }

            //realizo la actualizacion
            User::where("id",$user->id)->update([
                                                  'name'=>$data['name'],
                                                  'phone'=>$data['phone'],
                                                  'cuenta_bancaria'=>$data['cuenta_bancaria']
                                                ]);

        }else{

            $dt=$request->validated();
            //valido que el tamaño del telefono sea valido
            if(strlen($dt['phone']) < 7 ||  strlen($dt['phone']) > 13){
                $msn="Ingresa un número de télefono valido este debe contar con mínimo 7  y máximo caracteres ";
                return back()->with('error',$msn);
            }else{
                User::where("id",$user->id)->update([
                                                  'name'=>$dt['name'],
                                                  'phone'=>$dt['phone'],
                                                  'cuenta_bancaria'=>$dt['cuenta_bancaria']
                                                ]);
            }

            //aqui cambio la contraseña si el usuario envia los datos
            if(array_key_exists("password", $dt)){
                $dt["password"]=bcrypt($dt["password"]);
                User::where("id",$user->id)->update([
                                                  'password'=>$dt['password']

                                                ]);
            }
            $msn='Se han actualizado los datos correctamente';

        }



        return back()->with('success',$msn);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('delete',$user);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Usuario ha sido eliminado correctamente');
    }
    /**
     * Funcion para hacer cambio del correo
     * @param  [type] $id           [description]
     * @param  [type] $nuevo_correo [description]
     * @return [type]               [description]
     */
    public function cambio_correo($id,$nuevo_correo){
        if(filter_var($nuevo_correo, FILTER_VALIDATE_EMAIL)){
            $dd=User::where("id",$id)->get();
                if(count($dd)==1){
                    $ot_u=User::where("email",$nuevo_correo)->get();
                    if(count($ot_u)==0){
                        if(auth()->user()!=null){
                            User::where("id",$id)->update(["email"=>$nuevo_correo]);
                            return redirect()->route('users.show',$id)->with('success', 'Hemos registrado este nuevo correo');
                        }else{
                            User::where("id",$id)->update(["email"=>$nuevo_correo]);
                            return redirect()->route('login')->with('success', 'Hemos registrado tu nuevo correo, por favor ingresa, con el correo que acabas de confirmar');
                        }

                    }else{
                        return redirect()->route('users.show',$id)->with('error', 'Verifica tu código de cambio para el correo, esta cuenta de correo ya existe');
                    }

                }else{
                    return redirect()->route('users.show',$id)->with('error', 'Verifica tu código de cambio para el correo');
                }
        }else{
            return redirect()->route('users.show',$id)->with('error', 'Verifica tu correo electrónico');
        }



    }
    /**
     * Funcion para ver las bonificaciones
     * @return [type] [description]
     */
    public function mis_bonificaciones(){
        $bonificaciones=DB::table("bonificaciones")
                               ->select('users.id',
                                        'users.name',
                                        'bonificaciones.tipo_bonificacion',
                                        'bonificaciones.valor',
                                        'bonificaciones.created_at')
                               ->join("detalle_referidos","detalle_referidos.id","bonificaciones.fk_id_detalle_referido")
                               ->join("users","users.id","detalle_referidos.id_quien_refiere")
                               ->where("detalle_referidos.id_referido",Auth()->user()->id)->get();
        return view('recargas.mis_bonificaciones')
                ->with('bonificaciones',$bonificaciones)
                ->with('success', 'Estas son tus bonificaciones');

    }
    /**
     * Funcion para validar el código
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function validar_codigo($cod){
        
        
        $us=User::where("codigo_referido",$cod)->get();
        if(count($us)>0){
            return response()->json(["respuesta"=>true]);
        }
        return response()->json(["respuesta"=>false,"mensaje"=>"Error Código referido: El Código de la persona que te refirio no existe. Deja el espacio vacío o pregúntaselo nuevamente."]);
    }
    /**
     * FUncion para cambiar la clave
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function cambio_clave(Request $request){
      //dd(Hash::make($request['password']));
      //dd($request);
     User::where("email",$request['email'])->update(['password'=>bcrypt($request['password'])]);
     return redirect()->route('login')->with('success', 'Cambio realizado correctamente, por favor ingresa con tus nuevas datos de acceso ');

    }
    /*
     * Funcion que realiza consulta de los anuncios que ha clickeado el usuario
     * @return [type] [description]
     */
    public function anuncios_vistos_por_mi(){

     if(Auth()->user()==null){



        return redirect('/');

     }
     $ad_saw=DB::table('detalle_clic_anuncios')
                ->select("anuncios.id as id_anuncio",
                            "anuncios.id as id",
                             "anuncios.cod_anuncio",
                             "anuncios.tipo_anuncio",
                             "anuncios.ubicacion",
                             "anuncios.moneda",
                             "anuncios.nombre_moneda",
                             "anuncios.criptomoneda",
                             "anuncios.nombre_cripto_moneda",
                             "anuncios.banco",
                             "anuncios.precio_minimo_moneda",
                             "anuncios.margen",
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
                             DB::Raw("FORMAT(users.calificacion/users.num_calificaciones,1) as calificacion"),
                             'detalle_clic_anuncios.updated_at' )
                ->join('anuncios','anuncios.id','detalle_clic_anuncios.id_anuncio')
                ->join('users','users.id','anuncios.user_id')
                ->join("recargas","recargas.user_id","users.id")
                ->where('detalle_clic_anuncios.id_usuario',Auth()->user()->id)
                ->orderBy('detalle_clic_anuncios.updated_at','DESC')
                ->get();

       $ad_arr=new Anuncios();
       $arr_anuncios = $ad_arr->ver_anuncios($ad_saw);

      //dd($ad_saw,$arr_anuncios);
      return view('posts.mis_anuncios_vistos')
                ->with('anuncios_vistos',$arr_anuncios)
                ->with('success', 'Aqui esta el listado de los clic que haz visto');
    }

    /**
     * Funcion para cambiar el horario del dia
     * @param  [type] $id       [description]
     * @param  [type] $horarios [description]
     * @return [type]           [description]
     */
    public function cambiar_horario( $id,$horarios){
        //dd($horarios);
        DB::table('detalle_horario_usuario')->where('id',$id)
                                            ->update([
                                                        'horario'=>$horarios
                                                      ]);
        return response()->json(["respuesta"=>true]);
    }
    /**
     * Funcion para cambia el estado del dia
     * @param  [type] $id     [description]
     * @param  [type] $estado [description]
     * @return [type]         [description]
     */
    public function cambiar_estado_dia($id,$estado){

        if($estado=="false"){
            $estado2='CERRADO';
        }else{
            $estado2='ABIERTO';
        }
        DB::table('detalle_horario_usuario')
                ->where('id',$id)->update([
                        'estado_dia'=>$estado2
                       ]);
        return response()->json(["respuesta"=>true,"estado"=>$estado2]);
    }
    /**
     * Funcion para realizar el registro del código wallet
     * @param  Request $request [description]
     * @param  [type]  $id      [description]
     * @return [type]           [description]
     */
    public function registrar_wallet(Request $request,$id){
        //dd([$request["datos"],$request["valor_moneda"],$request["cantidad_moneda_comprada"],$id,auth()->user()->id]);

        $PG=DB::table('pagos')->where([
                                    ["id_anuncio",$id],
                                    ["id_user_compra",auth()->user()->id],
                                    ["transactionState","Pendiente"]
                                    //["code_wallet","=",null],
                                    
                                ])
                                ->orwhere([
                                    ["id_anuncio",$id],
                                    ["id_user_compra",auth()->user()->id],
                                    ["transactionState","Pago Aceptado"]
                                    //["code_wallet","=",null],
                                    
                                ])
                                ->orwhere([
                                    ["id_anuncio",$id],
                                    ["id_user_compra",auth()->user()->id],
                                    ["transactionState","Visto"]
                                    //["code_wallet","=",null],
                                    
                                ])
                                ->get();
        if(count($PG)>0){

                DB::table('pagos')
                         ->where("id",$PG[0]->id)
                         ->update([
                            "code_wallet"=>$request["datos"],
                            "transactionQuantity"=>$request["cantidad_moneda_comprada"],
                            "transation_value"=>$request["valor_moneda"],
                         ]);

                         




               return response()->json(["mensaje"=>"Wallet actualizado, ya puedes realizar la compra","respuesta"=>true]);

        }/*else{

            DB::table('pagos')->insert([
                            "transactionQuantity"=>0,
                            "transactionStatePayu"=>0,
                            "transation_value"=>0,
                            "id_anuncio"=>$id,
                            "metodo_pago"=>'PENDIENTE',
                            "id_user_compra"=>auth()->user()->id,
                            "code_wallet"=>$request["datos"],
                            "transactionQuantity"=>$request["cantidad_moneda_comprada"],
                            "transation_value"=>$request["valor_moneda"],
                            ]);
            return response()->json(["mensaje"=>"Wallet registrado, ya puedes realizar la compra","respuesta"=>true]);
        }*/


    }
    /**
     * Funcion para registarr el codigo qr del wallet
     * @param  Request $request [description]
     * @param  [type]  $id      [description]
     * @return [type]           [description]
     */
    public function registrar_wallet_qr(Request $request,$id){
         //dd($id);
         $this->validate(request(),[
            'file'=>'required|max:10240|mimetypes:application/pdf'
        ]);

         $PG=DB::table('pagos')->where([
                                    ["id_anuncio",$id],
                                    ["id_user_compra",auth()->user()->id],
                                    ["transactionState","Pendiente"],
                                    //["image_wallet","=",'SIN REGISTRAR'],
                                    
                                ])
                                ->orwhere([
                                    ["id_anuncio",$id],
                                    ["id_user_compra",auth()->user()->id],
                                    ["transactionState","Pago Aceptado"],
                                    //["image_wallet","=",'SIN REGISTRAR'],
                                    
                                ])
                                ->orwhere([
                                    ["id_anuncio",$id],
                                    ["id_user_compra",auth()->user()->id],
                                    ["transactionState","Visto"],
                                    //["image_wallet","=",'SIN REGISTRAR'],
                                    
                                ])
                                ->get();
                         
         
        
                                                   

        if(count($PG)>0){
                $filename = $request->file('file')->move('archivos/'.$PG[0]->id);
                $newname="/wallet.".explode(".",$_FILES['file']['name'])[1];
                rename($filename,realpath(dirname($filename)).$newname);

                //dd($PG[0]->id.$newname);

                DB::table('pagos')
                         ->where("id",$PG[0]->id)
                         ->update([
                            "image_wallet"=>$PG[0]->id.$newname                            
                         ]);

               return response()->json(["mensaje"=>"Wallet actualizado, ya puedes realizar la compra","respuesta"=>true]);

        }else{
             return  response()->json(['respuesta'=>true,'mensaje'=>'Por favor selecciona la cantidad que deseas comprar']);
        }                        


       
      
                
        
       
    }
    /**
     * Funcion para registar el codigo wallet desde el email
     * @param  [type] $id_transaccion [description]
     * @return [type]                 [description]
     */
    public function registrar_codigo_wallet_email($id_transaccion){
        dd($id_transaccion);
    }
    /**
     * Funcion para realizar el registro de codigo wallet de una transaccion realizada
     * @param  Request $request        [description]
     * @param  [type]  $id_transaccion [description]
     * @return [type]                  [description]
     */
    public function registrar_wallet_transaccion_realizada(Request $request,$id_transaccion){
        //dd($id_transaccion,$request['codigo_wallet']);
        
        $request->validate([
            'codigo_wallet'=>'required'
        ]);

        DB::table('pagos')->where('id',$id_transaccion)->update([
                                            'code_wallet'=>$request['codigo_wallet']

                                            ]);
        $pg=DB::table('pagos')->where('pagos.id',$id_transaccion)
               ->join('anuncios','anuncios.id','pagos.id_anuncio')
               ->join('users','users.id','anuncios.user_id')
               ->get();

        //dd($pg[0]->user_id);       
        $recarga=Recargas::where('user_id',$pg[0]->user_id)->get();       
        
        //esta linea esta fallando y no me esta dejando retornar a la vista
        NotificacionAnuncio::dispatch($pg[0], [auth()->user(),$pg[0],['url'=>config('app.url').'/ver_mis_ventas/'.$pg[0]->user_id.'?id='.$pg[0]->transactionId]],$recarga[0]->valor,"WalletRegistrado");

        $pag=DB::table('pagos')->select('pagos.id as id_pago',
                           'pagos.transactionId',
                           'pagos.transactionStatePayU',
                           'pagos.transactionState',
                           'pagos.transactionQuantity',
                           'pagos.transation_value',
                           'pagos.id_anuncio',
                           'pagos.id_user_compra',
                           'pagos.metodo_pago',
                           'pagos.estado_pago',
                           'pagos.calificacion',
                           'pagos.opinion',
                           'pagos.created_at',
                           'pagos.updated_at',
                           'pagos.code_wallet',
                           'pagos.image_wallet',
                           'pagos.hash_txid',
                           'anuncios.cod_anuncio',
                           'anuncios.tipo_anuncio',
                           'anuncios.ubicacion',
                           'anuncios.cod_postal',
                           'anuncios.moneda',
                           'anuncios.nombre_moneda',
                           'anuncios.criptomoneda',
                           'anuncios.nombre_cripto_moneda',
                           'users.id as id_anunciante ',
                           'users.name',
                           'users.email',
                           'users.phone')
                    ->join('anuncios','anuncios.id','pagos.id_anuncio')
                    ->join('users','users.id','anuncios.user_id')
                    ->where('id_user_compra',auth()->user()->id)
                    ->get();
        //dd(auth()->user()->id.'?='.$pg[0]->transactionId);            
        //return redirect()->route('mis_compras',[auth()->user()->id.'?='.$pg[0]->transactionId])
                    //->with('success','Código wallet ha sido registrado');
        return response()->json(["respuesta"=>true,'mensaje'=>'Código wallet ha sido registrado'    ]);
    }
    /**
     * Funcion para realizar el registro del hash de una transaccion realizada
     * @param  Request $request        [description]
     * @param  [type]  $id_transaccion [description]
     * @return [type]                  [description]
     */
    public function registrar_hash_transaccion_realizada(Request $request,$id_transaccion){

        $request->validate([
            'hash_txid'=>'required|unique:pagos'
        ]);

        pagos::where('id',$id_transaccion)->update([
                                                    'hash_txid'=>$request['hash_txid'],
                                                    'transactionState'=>'Moneda Envíada'
                                                    ]);

        $pg=DB::table('pagos')
                ->where('pagos.id',$id_transaccion)
               ->join('anuncios','anuncios.id','pagos.id_anuncio')
               ->join('users','users.id','pagos.id_user_compra')
               ->get();

        //EVENTO PARA ENVIAR CORREO DE ENVIO DE MONEDA
        NotificacionAnuncio::dispatch($pg[0], [auth()->user(),$pg[0],['url'=>config('app.url').'/ver_mis_compras/'.$pg[0]->id_user_compra.'?id='.$pg[0]->transactionId]],0,"HashRegistrado");

        return back()->with('success','El código hash / txid ha sido registrado.');
    }

    /**
     * Funcion para consultar las compras que ha realizado un usuario
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function ver_mis_compras($id){
        if($id==auth()->user()->id){
            $pag=pagos::select('pagos.id as id_pago',
                           'pagos.transactionId',
                           'pagos.transactionStatePayU',
                           'pagos.transactionState',
                           'pagos.transactionQuantity',
                           'pagos.transation_value',
                           'pagos.transaction_value_pagado',                          
                           'pagos.id_anuncio',
                           'pagos.id_user_compra',
                           'pagos.metodo_pago',
                           'pagos.estado_pago',
                           'pagos.calificacion',
                           'pagos.opinion',
                           'pagos.created_at',
                           'pagos.updated_at',
                           'pagos.code_wallet',
                           'pagos.image_wallet',
                           'pagos.hash_txid',
                           'pagos.moneda_pago',
                           'anuncios.cod_anuncio',
                           'anuncios.tipo_anuncio',
                           'anuncios.ubicacion',
                           'anuncios.cod_postal',
                           'anuncios.moneda',
                           'anuncios.nombre_moneda',
                           'anuncios.criptomoneda',
                           'anuncios.nombre_cripto_moneda',
                           'anuncios.limite_min',
                           'users.id as id_anunciante ',
                           'users.name',
                           'users.email',
                           'users.phone')
                    ->join('anuncios','anuncios.id','pagos.id_anuncio')
                    ->join('users','users.id','anuncios.user_id')
                    ->where([
                                ['id_user_compra',$id],
                                ['pagos.transactionId','!=',null]
                            ])
                    /*->orwhere([
                                ['id_user_compra',$id],
                                ['pagos.code_wallet','!=','SIN REGISTRAR'],
                                ['pagos.image_wallet','!=','SIN REGISTRAR']
                                //['pagos.transactionId','!=',null]
                            ])*/
                    ->orderBy('pagos.updated_at','DESC')
                    ->get();
        //dd([$pag,auth()->user()->name]);
        return view('posts.mis_compras')
                ->with('mis_compras',$pag);


        

        }else{
            abort(404);
        }    
        


    }
    /**
     * Funcion para rconsultar las ventas que ha realizado
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function ver_mis_ventas($id){

        if($id==auth()->user()->id){
            $pag=pagos::select('pagos.id as id_pago',
                           'pagos.transactionId',
                           'pagos.transactionStatePayU',
                           'pagos.transactionState',
                           'pagos.transactionQuantity',
                           'pagos.transation_value',
                           'pagos.transaction_value_pagado',
                           'pagos.porcentaje_pago',
                           'pagos.id_anuncio',
                           'pagos.id_user_compra',
                           'pagos.metodo_pago',
                           'pagos.estado_pago',
                           'pagos.calificacion',
                           'pagos.opinion',
                           'pagos.created_at',
                           'pagos.updated_at',
                           'pagos.code_wallet',
                           'pagos.image_wallet',
                           'pagos.hash_txid',
                           'pagos.moneda_pago',
                           'anuncios.cod_anuncio',
                           'anuncios.tipo_anuncio',
                           'anuncios.ubicacion',
                           'anuncios.cod_postal',
                           'anuncios.moneda',
                           'anuncios.nombre_moneda',
                           'anuncios.criptomoneda',
                           'anuncios.nombre_cripto_moneda',
                           'users.id as id_anunciante ',
                           'users.name',
                           'users.email',
                           'users.phone')
                    ->join('anuncios','anuncios.id','pagos.id_anuncio')
                    ->join('users','users.id','pagos.id_user_compra')
                    ->where([
                                ['anuncios.user_id',$id],
                                ['pagos.transactionId','!=',null]
                            ])
                    ->orderBy('pagos.updated_at','DESC')
                    ->get();
        $variables = DB::table('variables')->select('valor')->first();
        //dd($pag);
        return view('posts.mis_ventas')
                ->with('mis_ventas',$pag)
                ->with('variables',$variables);
        }else{
                abort(404);
        }
        
    }

    public function ver_todas_las_transacciones(){
       if(auth()->user()->hasRole('Admin')){
         $pag=pagos::select('pagos.id as id_pago',
                           'pagos.estado_pago',
                           'pagos.transactionState',
                           'pagos.metodo_pago',
                           'pagos.numero_transaccion',
                           'pagos.transactionQuantity',
                           'pagos.porcentaje_pago',
                           'pagos.transation_value',
                           'pagos.transaction_value_pagado',
                           'pagos.transactionId',
                           'pagos.code_wallet',
                           'pagos.hash_txid',
                           'pagos.moneda_pago',
                           'pagos.updated_at',
                           'anuncios.tipo_anuncio',
                           'anuncios.nombre_cripto_moneda',
                           'anuncios.tipo_anuncio',
                           'users.id',
                           'users.name',
                           'users.email',
                           'users.phone',
                           'users.cuenta_bancaria',
                           'users.certificacion_bancaria'
                        )
                    ->join('anuncios','anuncios.id','pagos.id_anuncio')
                    ->join('users','users.id','anuncios.user_id')
                    ->where('transactionState','<>','Visto')
                    ->get();
         $variables = DB::table('variables')->select('valor')->get();

         return view('posts.ver_todas_las_transacciones',compact('pag','variables'));
       }else{
            abort(404);
       }

    }
    /**
     * Funcion para confirmar transaccion
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function confirmar_transaccion(Request $request,$id_transaccion){
         //dd($id_transaccion,$request);


        $pgh=pagos::where([['id',$id_transaccion],['transactionState','Transacción Finalizada']])->get();
        if(count($pgh)>0){
             return redirect()->route('mis_compras',[auth()->user()->id.'?='.$pgh[0]->transactionId])
                    ->with('error','Esta transacción ya fue confirmada ');
        }

         pagos::where('id',$id_transaccion)->update([
                                         'transactionState'=>'Transacción Finalizada'
                                        ]);
         
         //NOTIFICACION AL ADMINISTRADOR Y AL VENDEDOR
         $pg=DB::table('pagos')
                ->where('pagos.id',$id_transaccion)
               ->join('anuncios','anuncios.id','pagos.id_anuncio')
               ->join('users','users.id','anuncios.user_id')
               ->get();
          $comprador=DB::table('pagos')
                ->where('pagos.id',$id_transaccion)
               ->join('anuncios','anuncios.id','pagos.id_anuncio')
               ->join('users','users.id','pagos.id_user_compra')
               ->get();    
           if($request['sel_opt_calificacion']=='Otros'){
            $opinion=$request['opinion'];
           }else{
            $opinion=$request['sel_opt_calificacion'];
           }    

          DB::table('detalle_clic_anuncios')
                  ->where([
                            ['id_anuncio',$request['id_anuncio_calificar']],
                            ['id_usuario',auth()->user()->id]
                        ])
                  ->update(['calificacion'=>$request["nota"],'opinion'=>$request["sel_opt_calificacion"],'comentario'=>$opinion]);
                  


          $an=Anuncios::where('id',$request['id_anuncio_calificar'])->get();
          User::where("id",$an[0]->user_id)->increment("calificacion",$request['nota']);
          User::where("id",$an[0]->user_id)->increment("num_calificaciones",1);    
          //dd($pg[0]);     
          $ad=DB::table('pagos')
                ->where('pagos.id',$id_transaccion)
               ->join('anuncios','anuncios.id','pagos.id_anuncio')
               ->get();    
        $uadmin=User::role('admin')->get();
        //dd($uadmin);
        foreach ($uadmin as $key => $value) {      
         NotificacionAnuncio::dispatch($value, [$pg[0],auth()->user(),$ad[0],['url'=>config('app.url').'/ver_todas_las_transacciones?id='.$pg[0]->transactionId,'nota'=>$request['nota'],'comentario'=>$opinion]],0,"TransaccionConfirmadaAdmin");
        }
        //esta mal los datos no corresponden 
        //
        //PILAS XFKHSD
        //
         NotificacionAnuncio::dispatch($pg[0], [$comprador[0],$ad[0],['url'=>config('app.url').'/ver_mis_ventas/'.$pg[0]->id_user_compra.'?id='.$pg[0]->transactionId]],0,"TransaccionConfirmadaVendedor");
         
         return redirect()->route('mis_compras',[auth()->user()->id.'?='.$pg[0]->transactionId])
                    ->with('success','transacción confirmada, gracias por confiar en '.config('app.name'));
    }
    /**
     * Funcion paraaregistrar la certificacion bancaria
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function actualizar_certificacion_bancaria(Request $request,$id){

        $newname=$id.".".explode(".",$_FILES['file']['name'])[1];

        $filename = $request->file('file')->move('archivos/certificaciones/');
        
        rename($filename,'archivos/certificaciones/'.$newname);
        //dd($filename);
        User::where('id',$id)
                ->update([
                        'certificacion_bancaria'=>'/archivos/certificaciones/'.$newname
                    ]);
        return  response()->json(['respuesta'=>true,'mensaje'=>'Se ha registrado tu certificación bancaria']);



    }
     /*
      Funcion para editar variables generales
     */
    public function editar_variables(Request $request){
        //dd($request);
        Variable::where('nombre',$request['nombre'])
                 ->update([
                            'valor'=>$request['valor']
                          ]);

        return back()->with('success', 'Se ha cambiado el valor de la variable correctamente');
    }
    /**
     * [confirmar_pago_vendedor description]
     * Funcion para notificar al vendedor que su pago ya se realizo
     * @return [type] [description]
     */
    function confirmar_pago_vendedor(Request $request,$id){
      $vendedor=User::where('id',$request['id_usuario'])->first();
      $porcentaje=Variable::where('nombre','porcentaje_tramite')->first();
       $pago=DB::table('pagos')            
                    ->where('pagos.id',$id)
                    ->update([
                        "transactionState"=>"Pago hecho al anunciante",
                        "porcentaje_pago"=>$porcentaje->valor,
                        ]);

      $pago=DB::table('pagos')
            ->select('anuncios.tipo_anuncio',
                    'anuncios.criptomoneda',
                    'anuncios.nombre_cripto_moneda',
                    'anuncios.nombre_moneda',
                    'pagos.transactionQuantity',
                    'pagos.transation_value',
                    'pagos.transactionId')
            ->join('anuncios','anuncios.id','pagos.id_anuncio')
            ->where('pagos.id',$id)->first();
      
      //dd($request);
      NotificacionAnuncio::dispatch($vendedor,
                            [   $pago,
                                ['url'=>config('app.url').'/ver_mis_ventas/'.$vendedor->id.'?id='.$pago->transactionId],
                                ['mensaje'=>$request['mensaje']]
                            ],
                            0,
                            "NotificarPagoAnunciante");
      return back()->with('success','Notificación enviada al vendedor correctamente');
    }
    /**
     * [confirmar_pago_vendedor description]
     * Funcion donde el vendedor confirma que si recibio el pago
     * @return [type] [description]
     */
    function confirmar_pago_por_vendedor(Request $request,$id){
      $vendedor=User::where('id',$request['id_usuario'])->first();
       $pago=DB::table('pagos')            
                    ->where('pagos.id',$id)
                    ->update([
                        "transactionState"=>"Pago confirmado por el anunciante",
                        ]);

      $pago=DB::table('pagos')
            ->select('anuncios.tipo_anuncio',
                    'anuncios.criptomoneda',
                    'anuncios.nombre_cripto_moneda',
                    'anuncios.nombre_moneda',
                    'pagos.transactionQuantity',
                    'pagos.transation_value',
                    'pagos.porcentaje_pago',
                    'pagos.transactionId')
            ->join('anuncios','anuncios.id','pagos.id_anuncio')
            ->where('pagos.id',$id)->first();
      $pg=(($pago->transation_value) - ($pago->transation_value*((float)$pago->porcentaje_pago/100)));
        //dd($pg);
        $uadmin=User::role('admin')->get();
        //dd($uadmin);
        foreach ($uadmin as $key => $value) {    
            NotificacionAnuncio::dispatch($value,
                            [   $pago,
                                ['url'=>config('app.url').'/ver_todas_las_transacciones/?id='.$pago->transactionId],
                                ['mensaje'=>$request['mensaje']],
                                ['pago'=>$pg]
                            ],
                            0,
                            "NotificarPagoAdministrador");
        }
      return back()->with('success','Notificación enviada al administrador correctamente');
    }
}
