<?php

namespace App\Observers;

use App\Models\User;
use App\Models\HUser;

class UserObserver
{
    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    public $afterCommit = true;


    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {
        HUser::create([
            'name' => $user->name,
            'username' => $user->user_name,
            'password' => $user->password,
            'acting_status' => 1,
            'h_created_by_user' => $user->id,
            'h_created_at' => now(),
            'h_crud_operation' => 1,
            'h_id' => $user->id,
        ]);
    }

    /**
     * Handle the User "updated" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        HUser::create([
            'name' => $user->name,
            'username' => $user->user_name,
            'password' => $user->password,
            'acting_status' => 1,
            'h_created_by_user' => $user->id,
            'h_created_at' => now(),
            'h_crud_operation' => 2,
            'h_id' => $user->id,
        ]);
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the User "restored" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
