<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Spatie\Permission\Models\Role;

class UserPolicy
{
    use HandlesAuthorization;


      public function before($user){

          if ($user->hasRole('Admin'))
          {

              return true;
          }

      }



    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function view(User $authUser, User $user)
    {

          return $authUser->id === $user->id || $user->hasPermissionTo('Ver Usuarios');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {


        return $user->hasPermissionTo('Crear Usuarios');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function update(User $authUser, User $user)

    {

        return $authUser->id === $user->id || $user->hasPermissionTo('Editar Usuarios');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function delete(User $authUser, User $user)
    {
      if ($authUser->id === $user->id) {

            $this->deny('No se puede eliminar este Usuario');

      }
      return $user->hasRole('Admin') || $user->hasPermissionTo('Eliminar Usuarios');
    }
}
