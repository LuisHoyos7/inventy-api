<?php

namespace App\Actions\Aliaddo;

use Lorisleiva\Actions\Concerns\AsAction;

class MakeBranch
{
    use AsAction;

    public function handle(): array
    {
        return [
            'name' => '',
            'address' => '',
            'phone' => '',
            'countryCode' => '',
            'countryName' => '',
            'departamentCode' => '',
            'departamentName' => '',
            'cityCode' => '',
            'cityName' => '',
        ];
    }
}
