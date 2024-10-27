<?php

namespace App\Policies;

use App\Models\InventoryMovement;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class InventoryMovementPolicy
{
    use HandlesAuthorization;

    public function allowRestify(User $user = null): bool
    {
        return true;
    }
    
}
