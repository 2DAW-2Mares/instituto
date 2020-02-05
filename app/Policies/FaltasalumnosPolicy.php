<?php

namespace App\Policies;

use App\Faltasalumnos;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FaltasalumnosPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any faltasalumnos.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the faltasalumnos.
     *
     * @param  \App\User  $user
     * @param  \App\Faltasalumnos  $faltasalumnos
     * @return mixed
     */
    public function view(User $user, Faltasalumnos $faltasalumnos)
    {
       return true;
    }

    /**
     * Determine whether the user can create faltasalumnos.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
       
    }

    /**
     * Determine whether the user can update the faltasalumnos.
     *
     * @param  \App\User  $user
     * @param  \App\Faltasalumnos  $faltasalumnos
     * @return mixed
     */
    public function update(User $user, Faltasalumnos $faltasalumnos)
    {
        return $user->id === $faltasalumnos->alumno
        ? Response::allow()
        : Response::deny('No eres el profesor ha generado la falta.');
    }

    /**
     * Determine whether the user can delete the faltasalumnos.
     *
     * @param  \App\User  $user
     * @param  \App\Faltasalumnos  $faltasalumnos
     * @return mixed
     */
    public function delete(User $user, Faltasalumnos $faltasalumnos)
    {
        return $user->id === $faltasalumnos->alumno
        ? Response::allow()
        : Response::deny('No eres el profesor ha generado la falta.');
    }

    /**
     * Determine whether the user can restore the faltasalumnos.
     *
     * @param  \App\User  $user
     * @param  \App\Faltasalumnos  $faltasalumnos
     * @return mixed
     */
    public function restore(User $user, Faltasalumnos $faltasalumnos)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the faltasalumnos.
     *
     * @param  \App\User  $user
     * @param  \App\Faltasalumnos  $faltasalumnos
     * @return mixed
     */
    public function forceDelete(User $user, Faltasalumnos $faltasalumnos)
    {
        //
    }
}
