<?php

namespace App\Policies;

use App\User;
use App\Anuncios;
use Illuminate\Auth\Access\HandlesAuthorization;

class AnunciosPolicy
{
    use HandlesAuthorization;
    public function before($user){

          if ($user->hasRole('Admin'))
          {

              return true;
          }

      }
    /**
     * Determine whether the user can view the anuncios.
     *
     * @param  \App\User  $user
     * @param  \App\Anuncios  $anuncios
     * @return mixed
     */
    public function view(User $user, Anuncios $anuncios)
    {
        return $user->hasPermissionTo('Ver Anuncios');
    }

    /**
     * Determine whether the user can create anuncios.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
        return $user->hasPermissionTo('Crear Anuncios');
    }

    /**
     * Determine whether the user can update the anuncios.
     *
     * @param  \App\User  $user
     * @param  \App\Anuncios  $anuncios
     * @return mixed
     */
    public function update(User $user, Anuncios $anuncios)
    {   
        return $user->hasPermissionTo('Editar Anuncios');
    }

    /**
     * Determine whether the user can delete the anuncios.
     *
     * @param  \App\User  $user
     * @param  \App\Anuncios  $anuncios
     * @return mixed
     */
    public function delete(User $user, Anuncios $anuncios)
    {
        //
        return $user->hasPermissionTo('Eliminar Anuncios');
    }
}
