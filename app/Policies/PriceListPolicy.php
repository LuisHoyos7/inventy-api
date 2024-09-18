<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\PriceList;

class PriceListPolicy
{
    use HandlesAuthorization;

    public function allowRestify(User $user = null): bool
    {
        return true;
    }

    public function show(User $user = null, PriceList $model): bool
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

    public function update(User $user, PriceList $model): bool
    {
        return true;
    }

    public function updateBulk(User $user, PriceList $model): bool
    {
        return false;
    }

    public function deleteBulk(User $user, PriceList $model): bool
    {
        return false;
    }

    public function delete(User $user, PriceList $model): bool
    {
        return true;
    }
}
