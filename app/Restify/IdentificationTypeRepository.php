<?php

namespace App\Restify;

use App\Models\IdentificationType;
use Binaryk\LaravelRestify\Fields\HasMany;
use Binaryk\LaravelRestify\Http\Requests\RestifyRequest;

class IdentificationTypeRepository extends Repository
{
    public static string $model = IdentificationType::class;

    public function fields(RestifyRequest $request): array
    {
        return [
            id(),
            field('name')->rules('required', 'min:3', 'max:255'),
            field('code')->rules('required', 'min:3', 'max:255'),
            HasMany::make('Companies', 'companies', CompanyRepository::class),
        ];
    }
}
