<?php

namespace App\Policies;

use App\Models\Administrator;
use App\Models\Campaign;
use Illuminate\Auth\Access\Response;

class CampaignPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    // public function viewAny(Administrator $administrator): bool
    // {
    //     //
    // }

    /**
     * Determine whether the user can view the model.
     */
    // public function view(Administrator $administrator, Campaign $campaign): bool
    // {
    //     //
    // }

    /**
     * Determine whether the user can create models.
     */
    // public function create(Administrator $administrator): bool
    // {
    //     //
    // }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Administrator $administrator, Campaign $campaign): bool
    {
        return $administrator->id === $campaign->administrator_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    // public function delete(Administrator $administrator, Campaign $campaign): bool
    // {
    //     //
    // }

    /**
     * Determine whether the user can restore the model.
     */
    // public function restore(Administrator $administrator, Campaign $campaign): bool
    // {
    //     //
    // }

    /**
     * Determine whether the user can permanently delete the model.
     */
    // public function forceDelete(Administrator $administrator, Campaign $campaign): bool
    // {
    //     //
    // }
}
