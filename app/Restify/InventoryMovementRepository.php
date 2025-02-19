<?php

namespace App\Restify;

use App\Models\InventoryMovement;
use Binaryk\LaravelRestify\Fields\BelongsTo;
use Binaryk\LaravelRestify\Http\Requests\RestifyRequest;

class InventoryMovementRepository extends Repository
{
    public static string $model = InventoryMovement::class;

    public function fields(RestifyRequest $request): array
    {
        return [
            field('type')
                ->storingRules([
                    'required',
                    'string',
                ]),

            field('quantity')
                ->storingRules([
                    'required',
                    'integer',
                ]),
            field('created_at'),
        ];
    }

    //method index
    public static function allowedActions(): array
    {
        return [
            'index',
        ];
    }

    //relationships
    public static function related(): array
    {
        return [
            'item' => BelongsTo::make('item'),
            'transaction' => BelongsTo::make('transaction'),
            'company' => BelongsTo::make('company'),
        ];
    }
}
