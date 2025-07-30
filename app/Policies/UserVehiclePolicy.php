<?php

namespace App\Policies;

use App\Models\User;
use App\Models\UserVehicle;
use Illuminate\Auth\Access\Response;

class UserVehiclePolicy
{
    // todo: can remove or implement
    public static function scopeFor(User $user)
    {
        return UserVehicle::where('user_id', $user->id);
    }
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
        // return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, UserVehicle $vehicle): bool
    {
        return $user->id === $vehicle->user_id;
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
    public function update(User $user, UserVehicle $userVehicle): bool
    {
        return $user->id === $userVehicle->user_id; // allow editing own vehicles
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, UserVehicle $userVehicle): bool
    {
        return $user->id === $userVehicle->user_id; // allow deleting own vehicles
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, UserVehicle $userVehicle): bool
    {
        return $user->id === $userVehicle->user_id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, UserVehicle $userVehicle): bool
    {
        return false;
    }
}
