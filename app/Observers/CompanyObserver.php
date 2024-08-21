<?php

namespace App\Observers;

use App\Models\Branch;
use App\Models\Company;

class CompanyObserver
{
    public function created(Company $company)
    {
        Branch::create([
            'name'          => 'Principal',
            'company_id'    => $company->id
        ]);
    }
}
