<?php

namespace App\Policies;

use App\Models\User;
use App\Models\UserEducation;
use Illuminate\Auth\Access\HandlesAuthorization;

class EducationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UserEducation  $userEducation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, UserEducation $userEducation)
    {
        return $user->id == $userEducation->user_id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UserEducation  $userEducation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, UserEducation $userEducation)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UserEducation  $userEducation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, UserEducation $userEducation)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UserEducation  $userEducation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, UserEducation $userEducation)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UserEducation  $userEducation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, UserEducation $userEducation)
    {
        //
    }
}
