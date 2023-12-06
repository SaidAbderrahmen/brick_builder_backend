<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Ingredient;
use Illuminate\Auth\Access\HandlesAuthorization;

class IngredientPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the ingredient can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the ingredient can view the model.
     */
    public function view(User $user, Ingredient $model): bool
    {
        return true;
    }

    /**
     * Determine whether the ingredient can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the ingredient can update the model.
     */
    public function update(User $user, Ingredient $model): bool
    {
        return true;
    }

    /**
     * Determine whether the ingredient can delete the model.
     */
    public function delete(User $user, Ingredient $model): bool
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
     * Determine whether the ingredient can restore the model.
     */
    public function restore(User $user, Ingredient $model): bool
    {
        return false;
    }

    /**
     * Determine whether the ingredient can permanently delete the model.
     */
    public function forceDelete(User $user, Ingredient $model): bool
    {
        return false;
    }
}
