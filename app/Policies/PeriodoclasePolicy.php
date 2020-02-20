<?php

namespace App\Policies;

use App\Periodoclase;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class PeriodoclasePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any periodoclases.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the periodoclase.
     *
     * @param  \App\User  $user
     * @param  \App\Periodoclase  $periodoclase
     * @return mixed
     */
    public function view(User $user, Periodoclase $periodoclase)
    {
        //
    }

    /**
     * Determine whether the user can create periodoclases.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the periodoclase.
     *
     * @param  \App\User  $user
     * @param  \App\Periodoclase  $periodoclase
     * @return mixed
     */
    public function update(User $user, Periodoclase $periodoclase)
    {
        //
    }

    /**
     * Determine whether the user can delete the periodoclase.
     *
     * @param  \App\User  $user
     * @param  \App\Periodoclase  $periodoclase
     * @return mixed
     */
    public function delete(User $user, Periodoclase $periodoclase)
    {
        //
    }

    /**
     * Determine whether the user can restore the periodoclase.
     *
     * @param  \App\User  $user
     * @param  \App\Periodoclase  $periodoclase
     * @return mixed
     */
    public function restore(User $user, Periodoclase $periodoclase)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the periodoclase.
     *
     * @param  \App\User  $user
     * @param  \App\Periodoclase  $periodoclase
     * @return mixed
     */
    public function forceDelete(User $user, Periodoclase $periodoclase)
    {
        //
    }


    public function getHorarioDocente(User $user, $periodoclase)
    {
        $user = Auth::user();
        return ($user->isProfesor() || $user->isSuperAdmin())
            ? Response::allow()
            : Response::deny('Usted no tiene permisos para esta acción');
    }


    public function before($user, $ability)
{
    if ($user->isSuperAdmin()) {
        return true;
    }
}
}
