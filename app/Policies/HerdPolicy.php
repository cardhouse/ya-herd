<?php

namespace App\Policies;

use App\Models\Herd;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class HerdPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Herd $herd): bool
    {
        return $herd->createdBy()->is($user);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Herd $herd): bool
    {
        return $herd->createdBy()->is($user);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Herd $herd): bool
    {
        return $herd->createdBy()->is($user);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Herd $herd): bool
    {
        return $herd->createdBy()->is($user);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Herd $herd): bool
    {
        return $herd->createdBy()->is($user);
    }
}
