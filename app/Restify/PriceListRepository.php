<?php

namespace App\Restify;

use App\Models\PriceList;
use Binaryk\LaravelRestify\Fields\BelongsTo;
use Binaryk\LaravelRestify\Http\Requests\RestifyRequest;
use Binaryk\LaravelRestify\Repositories\Repository;

class PriceListRepository extends Repository
{
    public static string $model = PriceList::class;

    public function fields(RestifyRequest $request): array
    {
        return [
            field('name')->rules('required', 'min:3', 'max:255'),
        ];
    }

    public static function related(): array
    {
        return [
            'company' => BelongsTo::make('company'),
        ];
    }
}
