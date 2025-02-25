<?php

namespace App\Restify;

use App\Enums\CashMovementType;
use App\Models\CashMovement;
use App\Models\CashRegister;
use App\Models\User;
use Binaryk\LaravelRestify\Http\Requests\RestifyRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;


class CashMovementRepository extends Repository
{
    public static string $model = CashMovement::class;

    public function fields(RestifyRequest $request): array
    {
        return [
            field('type')
                ->rules([
                    'required',
                    Rule::enum(CashMovementType::class),
                ]),
            field('cash_register_id')
                ->rules([
                    'required',
                    Rule::exists(CashRegister::class, 'id')
                ])
                ->messages([
                    'required' => 'La caja es requerida',
                    'exists' => 'La caja no existe para este usuario',
                ]),
            field('user_id')
                ->rules([
                    'required',
                    Rule::exists(User::class, 'id')
                ])->messages([
                    'required' => 'El usuario es requerido',
                    'exists' => 'El usuario no existe en la base de datos',
                ]),
            field('created_at'),
            field('updated_at')
        ];
    }
}
