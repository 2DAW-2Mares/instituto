<?php

namespace App\Policies;

use App\Grupo;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class GrupoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any grupos.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the grupo.
     *
     * @param  \App\User  $user
     * @param  \App\Grupo  $grupo
     * @return mixed
     */
    public function view(User $user, Grupo $grupo)
    {
        return $user->id === $grupo->creador
            ? Response::allow()
            : Response::deny('No eres el creador de este grupo.');
    }

    /**
     * Determine whether the user can create grupos.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isProfesorCentro() || $user->isTutorGrupo()
            ? Response::allow()
            : Response::deny('No está autorizado para realizar esta acción');
    }

    /**
     * Determine whether the user can update the grupo.
     *
     * @param  \App\User  $user
     * @param  \App\Grupo  $grupo
     * @return mixed
     */
    public function update(User $user, Grupo $grupo)
    {
        //
    }

    /**
     * Determine whether the user can delete the grupo.
     *
     * @param  \App\User  $user
     * @param  \App\Grupo  $grupo
     * @return mixed
     */
    public function delete(User $user, Grupo $grupo)
    {
        //
    }

    /**
     * Determine whether the user can restore the grupo.
     *
     * @param  \App\User  $user
     * @param  \App\Grupo  $grupo
     * @return mixed
     */
    public function restore(User $user, Grupo $grupo)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the grupo.
     *
     * @param  \App\User  $user
     * @param  \App\Grupo  $grupo
     * @return mixed
     */
    public function forceDelete(User $user, Grupo $grupo)
    {
        //
    }

    public function asignaTutor(User $user, Grupo $grupo){
        return ($user->isCreadorGrupo($grupo) || $user->isCoordinadorCentro($grupo->anyoescolarObject->centroObject))
            ? Response::allow()
            : Response::deny('No tienes permisos para modificar éste grupo.');
    }

    public function before($user, $ability)
    {
        if ($user->isSuperAdmin()) {
            return true;
        }
    }
}
