<?php

namespace App\Restify;

use App\Models\Branch;
use App\Models\CashRegister;
use Binaryk\LaravelRestify\Http\Requests\RestifyRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CashRegisterRepository extends Repository
{
    public static string $model = CashRegister::class;

    public function fields(RestifyRequest $request): array
    {
        return [
            field('name')
                ->rules([
                    'required',
                    'string',
                    'max:255',
                ]),
            field('branch_id')
                ->rules([
                    'required',
                    Rule::exists(Branch::class, 'id')
                        ->where(fn($query) => $query->where('company_id', Auth::user()->company_id))
                ])
                ->messages([
                    'required' => 'La sucursal es requerida',
                    'exists' => 'La sucursal no existe para esta empresa',
                ]),
            field('created_at'),
            field('updated_at')
        ];
    }
}
