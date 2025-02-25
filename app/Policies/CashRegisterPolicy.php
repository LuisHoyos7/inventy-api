<?php

namespace App\Policies;

use App\Models\CashRegister;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CashRegisterPolicy
{
    use HandlesAuthorization;

    public function allowRestify(User $user = null): bool
    {
        return true;
    }

    public function show(User $user = null, CashRegister $model): bool
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

    public function update(User $user, CashRegister $model): bool
    {
        return true;
    }

    public function updateBulk(User $user, CashRegister $model): bool
    {
        return true;
    }

    public function deleteBulk(User $user, CashRegister $model): bool
    {
        return true;
    }

    public function delete(User $user, CashRegister $model): bool
    {
        return true;
    }
}
