<?php

namespace App\Policies;

use App\Models\Item;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Collection;

class TransactionPolicy
{
    use HandlesAuthorization;

    public function allowRestify(User $user = null): bool
    {
        return true;
    }

    public function show(User $user = null, Transaction $model): bool
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

    public function update(User $user, Transaction $model): bool
    {
        return true;
    }

    public function updateBulk(User $user, Transaction $model): bool
    {
        return false;
    }

    public function deleteBulk(User $user, Transaction $model): bool
    {
        return false;
    }

    public function delete(User $user, Transaction $model): bool
    {
        return false;
    }

    public function attachItems(User $authenticatedUser, Transaction $model, Item $item): bool
    {
        return true;
    }

    public function detachItems(User $authenticatedUser, Transaction $model, Item $item): bool
    {
        return true;
    }

    public function syncItems(User $authenticatedUser, Transaction $model, Collection $keys): bool
    {
        return true;
    }
}
