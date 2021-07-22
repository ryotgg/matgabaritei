<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EditorPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }



    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modulo  $modulo
     * @return mixed
     */
    public function update(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modulo  $modulo
     * @return mixed
     */
    public function delete(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modulo  $modulo
     * @return mixed
     */
    public function restore(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Modulo  $modulo
     * @return mixed
     */
    public function forceDelete(User $user)
    {
        return true;
    }

    /*
    public function before(User $user, $ability)
    {
        if ($user->isAdministrator()) {
            return true;
        }
    } 
    */
}
