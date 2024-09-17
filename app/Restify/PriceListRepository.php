<?php

namespace App\Restify;

use App\Models\Company;
use App\Models\PriceList;
use Binaryk\LaravelRestify\Http\Requests\RestifyRequest;
use Binaryk\LaravelRestify\Repositories\Repository;
use Binaryk\LaravelRestify\Fields\BelongsTo;
use Illuminate\Validation\Rule;

class PriceListRepository extends Repository
{
    public static string $model = PriceList::class;
    public static string $uriKey = 'pricelist';

    public function fields(RestifyRequest $request): array
    {
        return [
            field('name')->rules('required', 'min:3', 'max:255'),

            // Relación "muchos a uno" con el modelo Article
            BelongsTo::make('Item', 'item', ItemRepository::class),
        ];
    }
}
