<?php

namespace App\Restify;

use App\Models\Category;
use Binaryk\LaravelRestify\Http\Requests\RestifyRequest;

class CategoryRepository extends Repository
{
    public static string $model = Category::class;

    public function fields(RestifyRequest $request): array
    {
        return [
            id(),
            field('name'),
        ];
    }
}
