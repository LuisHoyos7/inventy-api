<?php

namespace App\Restify;

use App\Enums\WithholdingType;
use App\Models\Company;
use App\Models\Withholding;
use Binaryk\LaravelRestify\Http\Requests\RestifyRequest;
use Illuminate\Validation\Rule;

class WithholdingRepository extends Repository
{
    public static string $model = Withholding::class;

    public function fields(RestifyRequest $request): array
    {
        return [
            id(),
            field('name')->rules('required', 'min:3', 'max:255'),
            field('type')
                ->rules('required', Rule::enum(WithholdingType::class))
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
