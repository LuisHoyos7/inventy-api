<?php

namespace App\Restify;

use App\Enums\TaxType;
use App\Models\Company;
use App\Models\Tax;
use Binaryk\LaravelRestify\Http\Requests\RestifyRequest;
use Illuminate\Validation\Rule;

class TaxRepository extends Repository
{
    public static string $model = Tax::class;

    public function fields(RestifyRequest $request): array
    {
        return [
            id(),
            field('name')->rules('required', 'min:3', 'max:255'),
            field('type')
                ->rules('required', Rule::enum(TaxType::class))
                ->messages([
                    'required' => 'El tipo es requerido.',
                ]),
            field('percent')->rules('required', 'numeric'),
            field('amount')->rules('required', 'numeric'),
            field('company_id')
                ->rules('required', Rule::exists(Company::class, 'id'))
                ->messages([
                    'required' => 'La compañía es requerida',
                    'exists' => 'La compañía escogida no es válida.',
                ]),
        ];
    }
}
