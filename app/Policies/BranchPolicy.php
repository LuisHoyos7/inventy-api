<?php

namespace App\Policies;

use App\Models\Branch;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BranchPolicy
{
    use HandlesAuthorization;

    public function allowRestify(User $user = null): bool
    {
        return true;
    }

    public function show(User $user = null, Branch $model): bool
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

    public function update(User $user, Branch $model): bool
    {
        return true;
    }

    public function updateBulk(User $user, Branch $model): bool
    {
        return false;
    }

    public function deleteBulk(User $user, Branch $model): bool
    {
        return false;
    }

    public function delete(User $user, Branch $model): bool
    {
        return true;
    }
}
