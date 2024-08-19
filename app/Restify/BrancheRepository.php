<?php

namespace App\Restify;

use App\Models\Branche;
use Binaryk\LaravelRestify\Http\Requests\RestifyRequest;

class BrancheRepository extends Repository
{
    public static string $model = Branche::class;

    public function fields(RestifyRequest $request): array
    {
        return [
            id(),
            field('name')->rules('required'),
            field('address')->nullable(), 
        ];
    }
}
