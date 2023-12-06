<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Recepie;
use Illuminate\Auth\Access\HandlesAuthorization;

class RecepiePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the recepie can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the recepie can view the model.
     */
    public function view(User $user, Recepie $model): bool
    {
        return true;
    }

    /**
     * Determine whether the recepie can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the recepie can update the model.
     */
    public function update(User $user, Recepie $model): bool
    {
        return true;
    }

    /**
     * Determine whether the recepie can delete the model.
     */
    public function delete(User $user, Recepie $model): bool
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the recepie can restore the model.
     */
    public function restore(User $user, Recepie $model): bool
    {
        return false;
    }

    /**
     * Determine whether the recepie can permanently delete the model.
     */
    public function forceDelete(User $user, Recepie $model): bool
    {
        return false;
    }
}
