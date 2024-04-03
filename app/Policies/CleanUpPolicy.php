<?php

namespace App\Policies;

use App\Models\CleanUp;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CleanUpPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, CleanUp $cleanUp): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->role === 'admin'
            ? Response::allow()
            : Response::deny('You do not have permission to create a clean-up event');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, CleanUp $cleanUp): bool
    {
        // Allow only the user who created the CleanUp or an admin to update it
        return $user->id === $cleanUp->user_id || $user->role === 'admin';
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, CleanUp $cleanUp): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, CleanUp $cleanUp): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, CleanUp $cleanUp): bool
    {
        //
    }
}
