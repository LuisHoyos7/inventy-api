<?php

namespace App\Restify;

use App\Models\City;
use Binaryk\LaravelRestify\Http\Requests\RestifyRequest;

class CityRepository extends Repository
{
    public static string $model = City::class;

    public function fields(RestifyRequest $request): array
    {
        return [
            id(),
        ];
    }
}
