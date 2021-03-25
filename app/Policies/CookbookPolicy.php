<?php

namespace App\Policies;

use App\Models\Cookbook;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CookbookPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Cookbook  $cookbook
     * @return mixed
     */
    public function update(User $user, Cookbook $cookbook)
    {
        return $user->id === $cookbook->user->id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Cookbook  $cookbook
     * @return mixed
     */
    public function delete(User $user, Cookbook $cookbook)
    {
        return $user->id === $cookbook->user->id;
    }
}
