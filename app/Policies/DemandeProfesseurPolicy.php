<?php

namespace App\Policies;

use App\User;
use App\DemandeProfesseur;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\HandlesAuthorization;

class DemandeProfesseurPolicy
{
    use HandlesAuthorization;

    public function before(User $user, $ability){
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
     * @param  \App\DemandeProfesseur  $demandeProfesseur
     * @return mixed
     */
    public function view(User $user, DemandeProfesseur $demandeProfesseur = null)
    {
        return $user->id===3;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function accept(User $user)
    {
        return $user->id===3;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\DemandeProfesseur  $demandeProfesseur
     * @return mixed
     */
    public function reject(User $user, DemandeProfesseur $demandeProfesseur=null)
    {
        return $user->id===3;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\DemandeProfesseur  $demandeProfesseur
     * @return mixed
     */
    public function delete(User $user, DemandeProfesseur $demandeProfesseur)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\DemandeProfesseur  $demandeProfesseur
     * @return mixed
     */
    public function restore(User $user, DemandeProfesseur $demandeProfesseur)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\DemandeProfesseur  $demandeProfesseur
     * @return mixed
     */
    public function forceDelete(User $user, DemandeProfesseur $demandeProfesseur)
    {
        //
    }
}
