<?php

namespace App\Restify;

use App\Models\Company;
use Binaryk\LaravelRestify\Fields\HasMany;
use Binaryk\LaravelRestify\Http\Requests\RestifyRequest;

class CompanyRepository extends Repository
{
    public static string $model = Company::class;

    public function fields(RestifyRequest $request): array
    {
        return [
            field('name')->required(),
        ];
    }

    public static function related(): array
    {
        return [
            'users' => HasMany::make('users'),
            'priceLists' => HasMany::make('priceLists'),
        ];
    }
}
