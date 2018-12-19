<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\SaveRolesRequest;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Recargas;
class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $this->authorize('view', new Role);

        return view('admin.roles.index',[
          'roles'  => Role::all()
        ])->with("recarga",Recargas::where("user_id",auth()->user()->id)->select("valor")->first());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      $this->authorize('delete',$role = new Role);

        return view('admin.roles.create',[

          'role' => $role,
          'permissions' => Permission::pluck('name','id')

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveRolesRequest $request)
    {

        $this->authorize('create', new Role);

        // $data = $request->validate([
        //   'name' =>'required|unique:roles',
        //   'display_name' =>'required',
        // ],[
        //   'name.required' => 'El Campo Identficador es requerido',
        //   'name.unique' => 'El Campo Identficador ya esta registrado',
        //   'display_name.required' => 'El Campo Nombre es requerido'
        // ]);


        $role  = Role::create($request->validated());

         if ($request->has('permissions'))
            {
                $role->givePermissionTo($request->permissions);
            }

            return redirect()->route('roles.index')->with('success','El role fue creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {

      $this->authorize('update',$role);

       return view('admin.roles.edit',[

            'role' => $role,
           'permissions' => Permission::pluck('name','id')

       ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SaveRolesRequest $request, Role $role)
    {

      $this->authorize('update',$role);

          // $data = $request->validate([
          //
          //   'display_name' => 'required',
          //
          // ],[
          //   'display_name.required' => 'El Campo Nombre es requerido',
          // ]);


          $role->Update($request->validated());


          $role->permissions()->detach();


          if ($request->has('permissions'))
             {
                 $role->givePermissionTo($request->permissions);
             }

          return redirect()->route('roles.edit', $role)->with('success','El role fue Actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role )
    {

       $this->authorize('delete',$role);

        $role->delete();

        return redirect()->route('roles.index')->with('success','El role fue eliminado correctamente');
    }
}
