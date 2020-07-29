<?php

namespace App\Policies;

use App\Cours;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CoursPolicy
{
    use HandlesAuthorization;

    public function before(User $user,$ability){
        if($user->isAdmin()){
            return true;
        }
    }
    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {

    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Cours  $cours
     * @return mixed
     */
    public function view(User $user, Cours $cours)
    {
        return $cours->user_id===$user->id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Cours  $cours
     * @return mixed
     */
    public function update(User $user, Cours $cours)
    {
        return $cours->user_id===$user->id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Cours  $cours
     * @return mixed
     */
    public function delete(User $user, Cours $cours)
    {
        return $cours->user_id===$user->id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Cours  $cours
     * @return mixed
     */
    public function restore(User $user, Cours $cours)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Cours  $cours
     * @return mixed
     */
    public function forceDelete(User $user, Cours $cours)
    {
        //
    }
}
