<?php

namespace App\Observers;

use App\Models\Company;

class CompanyObserver
{
    public function created(Company $company)
    {
        Branche::create(['name' => 'Principal']);
    }
}
