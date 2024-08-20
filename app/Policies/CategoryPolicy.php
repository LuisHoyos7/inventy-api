<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    public function allowRestify(User $user = null): bool
    {
        return true;
    }

    public function show(User $user = null, Category $model): bool
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

    public function update(User $user, Category $model): bool
    {
        return false;
    }

    public function updateBulk(User $user, Category $model): bool
    {
        return false;
    }

    public function deleteBulk(User $user, Category $model): bool
    {
        return false;
    }

    public function delete(User $user, Category $model): bool
    {
        return false;
    }
}