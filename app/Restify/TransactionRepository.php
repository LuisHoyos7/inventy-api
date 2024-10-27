<?php

namespace App\Restify;

use App\Models\Transaction;
use Binaryk\LaravelRestify\Fields\BelongsTo;
use Binaryk\LaravelRestify\Http\Requests\RestifyRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
class TransactionRepository extends Repository
{
    public static string $model = Transaction::class;

    public function fields(RestifyRequest $request): array
    {
        return [

            field('type')
                ->storingRules([
                    'required',
                    'string',
                ]),

            field('date')
                ->storingRules([
                    'required',
                    'date',

                ]),

            field('total')
                ->storingRules([
                    'numeric',
                ]),
        ];
    }

    public static function related(): array
    {
        return [
            'company' => BelongsTo::make('company'),
        ];
    }

}
