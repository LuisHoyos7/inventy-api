<?php

namespace App\Restify;

use App\Models\Branch;
use Binaryk\LaravelRestify\Http\Requests\RestifyRequest;

class BranchRepository extends Repository
{
    public static string $model = Branch::class;

    public function fields(RestifyRequest $request): array
    {
        return [
            id(),
            field('name')->rules('required'),
        ];
    }
}
