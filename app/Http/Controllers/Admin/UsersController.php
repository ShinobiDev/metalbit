<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Events\UserWasCreated;
use App\Events\ActualizacionDatos;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use Spatie\Permission\Models\Permission;
use Illuminate\Routing\Redirector;
use App\Recargas;
use App\Payu;
use App\Anuncios;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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
        $data['costo_clic'] = 0;
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
                                       

          //dd($transacciones);                     
          return view('admin.user.show')->with('user', $user)
                    ->with('recargas', $recargas)
                    ->with("py",$py[0])
                    ->with("ref_code","rec_".$ref)
                    ->with("hash",$pp->hashear("rec_".$ref,20000,"COP"))
                    ->with("ad",$ad)
                    ->with("transacciones",$transacciones)
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
        //dd($request->validated());
        
        $uo=User::where("id",$user->id)->get();
        //dd([$request["email"],$uo[0]->email]);
        if($uo[0]->email!=$request["email"]){
            $msn="Hemos enviado un correo electrónico, a tu cuenta ".$request["email"].", por favor confirmalo para realizar los cambios de tu correo";
            $data=$request->validated();
            if(strlen($data['phone']) < 7 ||  strlen($data['phone']) > 13){
                $msn="Ingresa un número de télefono valido";
                return back()->with('error',$msn);                
            }   
            $arr["name"]=$data["name"];
            $arr["phone"]=$data["phone"];;
            if(array_key_exists("password", $data)){
                $arr["password"]=bcrypt($data["password"]);    
                //$arr["password"]=Hash::make($data["password"]);    
                User::where("id",$user->id)->update([
                                                  'password'=>bcrypt($data['password'])
                                                    ]);
            }
            //dd($arr);
            if(filter_var($request["email"], FILTER_VALIDATE_EMAIL)){
                $uu=User::where("email",$request["email"])->get();
                if(count($uu)==0){
                    //dd($request["email"]);
                    ActualizacionDatos::dispatch($user,$request["email"]);    
                }else{
                    $msn="No se ha podido registrar la cuenta de correo ".$request["email"].", está cuenta de correo, ya se encuentra registrada en nuestro sistema ";    
                }
                
            }else{
                $msn="Ingresa una cuenta de correo valida";
            }
            

            User::where("id",$user->id)->update([
                                                  'name'=>$data['name'],   
                                                  'phone'=>$data['phone']  
                                                ]);
            //$user->update($arr);
            
        }else{
            $dt=$request->validated();
            if(strlen($dt['phone']) < 7 ||  strlen($dt['phone']) > 13){
                $msn="Ingresa un número de télefono valido";
                return back()->with('error',$msn);                
            }else{
                User::where("id",$user->id)->update([
                                                  'name'=>$dt['name'],     
                                                  'phone'=>$dt['phone']  
                                                ]);
            }    
            if(array_key_exists("password", $dt)){
                $dt["password"]=bcrypt($dt["password"]);    
                User::where("id",$user->id)->update([
                                                  'name'=>$dt['name'],     
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

        return redirect()->route('users.index')->with('success', 'Usuario Eliminado correctamente');
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
     * Funcion para validar el codigo de referido de un usuario
     * @param  [type] $cod [description]
     * @return [type]      [description]
     */
    public function validar_codigo($cod){
        if($cod=="-"){
             return response()->json(["respuesta"=>true]);
        }
        $us=User::where("codigo_referido",$cod)->get();
        if(count($us)>0){
            return response()->json(["respuesta"=>true]);
        }
        return response()->json(["respuesta"=>false]);
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
                             DB::Raw("FORMAT(users.calificacion/users.num_calificaciones,1) as calificacion") )   
                ->join('anuncios','anuncios.id','detalle_clic_anuncios.id_anuncio') 
                ->join('users','users.id','anuncios.user_id')
                ->join("recargas","recargas.user_id","users.id")
                ->where('detalle_clic_anuncios.id_usuario',Auth()->user()->id)
                ->get();

       $ad_arr=new Anuncios();
       $arr_anuncios = $ad_arr->ver_anuncios($ad_saw);
       
      //dd($ad_saw);
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
     * Funcion para realizar el registro del codigo wallet 
     * @param  Request $request [description]
     * @param  [type]  $id      [description]
     * @return [type]           [description]
     */
    public function registrar_wallet(Request $request,$id){
        //dd([$request["datos"],$request["valor_moneda"],$request["cantidad_moneda_comprada"],$id,auth()->user()->id]);

        $PG=DB::table('pagos')->where([
                                    ["id_anuncio",$id],
                                    ["transactionState","=","Sin compra"],
                                    //["code_wallet","=",null],
                                    ["id_user_compra",auth()->user()->id]
                                ])
                                ->orwhere([
                                    ["id_anuncio",$id],
                                    ["transactionState","=","Pago Aceptado"],
                                    //["code_wallet","=",null],
                                    ["id_user_compra",auth()->user()->id]
                                ])
                                ->get();
         //dd($PG);                       
         if(count($PG)>0){

                DB::table('pagos')
                         ->where("id",$PG[0]->id)  
                         ->update([
                            "code_wallet"=>$request["datos"],
                            "transactionQuantity"=>$request["cantidad_moneda_comprada"],                            
                            "transation_value"=>$request["valor_moneda"],
                         ]);            
                         
               return response()->json(["mensaje"=>"Wallet actualizado, ya puedes realizar la compra","respuesta"=>true]);                                     
           
         }else{
            
            DB::table('pagos')->insert(["transactionId"=>"-",
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
         }
         

    }
    /**
     * Funcion para registarr el codigo qr del wallet
     * @param  Request $request [description]
     * @param  [type]  $id      [description]
     * @return [type]           [description]
     */
    public function registrar_wallet_qr(Request $request,$id){
        dd($request->file('file'));
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
     * Funcion para consultar las compras que ha realizado un usuario
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function ver_mis_compras($id){
        
        $pag=pagos::join('anuncios','anuncios.id','pagos.id_anuncio')
                    ->join('users','users.id','anuncios.user_id')
                    ->where('id_user_compra',$id)
                    ->get();
        //dd($pag);
        return view('posts.mis_compras')
                ->with('mis_compras',$pag);
                   

    }
    /**
     * Funcion para rconsultar las ventas que ha realizado
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function ver_mis_ventas($id){
        $pag=pagos::join('anuncios','anuncios.id','pagos.id_anuncio')
                    ->join('users','users.id','anuncios.user_id')
                    ->where('anuncios.user_id',$id)
                    ->get();
        //dd($pag);                    
        return view('posts.mis_ventas')
                ->with('mis_ventas',$pag);
    }
    public function ver_todas_las_transacciones(){
        $pag=pagos::join('anuncios','anuncios.id','pagos.id_anuncio')
                    ->join('users','users.id','anuncios.user_id')
                    ->get();
        dd($pag);        
    }
}


