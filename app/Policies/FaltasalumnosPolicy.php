<?php

namespace App\Policies;

use App\Faltaalumno;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
class FaltaalumnoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any Faltaalumno.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the Faltaalumno.
     *
     * @param  \App\User  $user
     * @param  \App\Faltaalumno  $Faltaalumno
     * @return mixed
     */
    public function view(User $user, Faltaalumno $Faltaalumno)
    {
       return true;
    }

    /**
     * Determine whether the user can create Faltaalumno.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
       
    }

    /**
     * Determine whether the user can update the Faltaalumno.
     *
     * @param  \App\User  $user
     * @param  \App\Faltaalumno  $Faltaalumno
     * @return mixed
     */
    public function update(User $user, Faltaalumno $Faltaalumno)
    {
        return $user->id === $Faltaalumno->periodoClaseObject->materiaimpartidaObject->docente
        ? Response::allow()
        : Response::deny('No eres el profesor ha generado la falta.');
    }

    /**
     * Determine whether the user can delete the Faltaalumno.
     *
     * @param  \App\User  $user
     * @param  \App\Faltaalumno  $Faltaalumno
     * @return mixed
     */
    public function delete(User $user, Faltaalumno $Faltaalumno)
    {
       

        return $user->id === $Faltaalumno->periodoClaseObject->materiaimpartidaObject->docente 
        ? Response::allow()
        : Response::deny('No eres el profesor ha generado la falta.');
    }

    /**
     * Determine whether the user can restore the Faltaalumno.
     *
     * @param  \App\User  $user
     * @param  \App\Faltaalumno  $Faltaalumno
     * @return mixed
     */
    public function restore(User $user, Faltaalumno $Faltaalumno)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the Faltaalumno.
     *
     * @param  \App\User  $user
     * @param  \App\Faltaalumno  $Faltaalumno
     * @return mixed
     */
    public function forceDelete(User $user, Faltaalumno $Faltaalumno)
    {
        //
    }
    public function before($user, $ability)
    {
        if ($user->isSuperAdmin()) {
            return true;
        }
    }
}
