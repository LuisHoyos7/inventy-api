<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Tax;

class TaxPolicy
{
    use HandlesAuthorization;

    public function allowRestify(User $user = null): bool
    {
        return true;
    }

    public function show(User $user = null, Tax $model): bool
    {
        return true;
    }

    public function store(User $user): bool
    {
        return true;
    }

    public function storeBulk(User $user): bool
    {
        return false;
    }

    public function update(User $user, Tax $model): bool
    {
        return true;
    }

    public function updateBulk(User $user, Tax $model): bool
    {
        return false;
    }

    public function deleteBulk(User $user, Tax $model): bool
    {
        return false;
    }

    public function delete(User $user, Tax $model): bool
    {
        return true;
    }
}
