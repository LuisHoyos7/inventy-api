<?php

namespace App\Policies;

use App\Models\Item;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ItemPolicy
{
    use HandlesAuthorization;

    public function allowRestify(?User $user = null): bool
    {
        return true;
    }

    public function show(?User $user, Item $model): bool
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

    public function update(User $user, Item $model): bool
    {
        return true;
    }

    public function updateBulk(User $user, Item $model): bool
    {
        return false;
    }

    public function deleteBulk(User $user, Item $model): bool
    {
        return false;
    }

    public function delete(User $user, Item $model): bool
    {
        return true;
    }
}
