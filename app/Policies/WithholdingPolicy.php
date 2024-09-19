<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Withholding;

class WithholdingPolicy
{
    use HandlesAuthorization;

    public function allowRestify(User $user = null): bool
    {
        return true;
    }

    public function show(User $user = null, Withholding $model): bool
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

    public function update(User $user, Withholding $model): bool
    {
        return true;
    }

    public function updateBulk(User $user, Withholding $model): bool
    {
        return false;
    }

    public function deleteBulk(User $user, Withholding $model): bool
    {
        return false;
    }

    public function delete(User $user, Withholding $model): bool
    {
        return true;
    }
}
