<?php

namespace App\Policies;

use App\Materia;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MateriaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any materias.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the materia.
     *
     * @param  \App\User  $user
     * @param  \App\Materia  $materia
     * @return mixed
     */
    public function view(User $user, Materia $materia)
    {
        return true;
    }

    /**
     * Determine whether the user can create materias.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return ($user -> isCoordinadorCentro($centro = null));
    }

    /**
     * Determine whether the user can update the materia.
     *
     * @param  \App\User  $user
     * @param  \App\Materia  $materia
     * @return mixed
     */
    public function update(User $user, Materia $materia)
    {
        return false;
    }

    /**
     * Determine whether the user can delete the materia.
     *
     * @param  \App\User  $user
     * @param  \App\Materia  $materia
     * @return mixed
     */
    public function delete(User $user, Materia $materia)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the materia.
     *
     * @param  \App\User  $user
     * @param  \App\Materia  $materia
     * @return mixed
     */
    public function restore(User $user, Materia $materia)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the materia.
     *
     * @param  \App\User  $user
     * @param  \App\Materia  $materia
     * @return mixed
     */
    public function forceDelete(User $user, Materia $materia)
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
