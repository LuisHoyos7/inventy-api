<?php

namespace App\Restify;

use App\Models\Country;
use Binaryk\LaravelRestify\Http\Requests\RestifyRequest;

class CountryRepository extends Repository
{
    public static string $model = Country::class;

    public function fields(RestifyRequest $request): array
    {
        return [
            id(),
        ];
    }
}
