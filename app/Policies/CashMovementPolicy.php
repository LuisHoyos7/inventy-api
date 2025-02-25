<?php

namespace App\Policies;

use App\Models\CashMovement;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CashMovementPolicy
{
    use HandlesAuthorization;

    public function allowRestify(User $user = null): bool
    {
        return true;
    }

    public function show(User $user = null, CashMovement $model): bool
    {
        return true;
    }

    public function store(User $user): bool
    {
        return true;
    }

    public function storeBulk(User $user): bool
    {
        return true;
    }

    public function update(User $user, CashMovement $model): bool
    {
        return true;
    }

    public function updateBulk(User $user, CashMovement $model): bool
    {
        return true;
    }

    public function deleteBulk(User $user, CashMovement $model): bool
    {
        return true;
    }

    public function delete(User $user, CashMovement $model): bool
    {
        return true;
    }
}
