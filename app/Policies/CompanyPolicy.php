<?php

namespace App\Policies;

use App\Models\Company;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CompanyPolicy
{
    use HandlesAuthorization;

    public function allowRestify(User $user = null): bool
    {
        return true;
    }

    public function show(User $user = null, Company $model): bool
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

    public function update(User $user, Company $model): bool
    {
        return false;
    }

    public function updateBulk(User $user, Company $model): bool
    {
        return false;
    }

    public function deleteBulk(User $user, Company $model): bool
    {
        return false;
    }

    public function delete(User $user, Company $model): bool
    {
        return false;
    }
}
