<?php

namespace App\Policies;

use App\Models\Billing;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BillingPolicy
{
    use HandlesAuthorization;

    public function allowRestify(User $user = null): bool
    {
        return true;
    }

    public function show(User $user = null, Billing $model): bool
    {
        return true;
    }

    public function store(User $user): bool
    {
        return false;
    }

    public function storeBulk(User $user): bool
    {
        return false;
    }

    public function update(User $user, Billing $model): bool
    {
        return false;
    }

    public function updateBulk(User $user, Billing $model): bool
    {
        return false;
    }

    public function deleteBulk(User $user, Billing $model): bool
    {
        return false;
    }

    public function delete(User $user, Billing $model): bool
    {
        return false;
    }
}
