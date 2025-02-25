<?php

namespace App\Observers;

use App\Models\Company;

class CompanyObserver
{
    public function created(Company $company)
    {
        $branch = $company->branches()->create([
            'name' => 'Principal'
        ]);

        $company->priceLists()->create([
            'name' => 'Principal',
        ]);

        $branch->cashRegisters()->create([
            'name' => 'Caja principal'
        ]);
    }
}
