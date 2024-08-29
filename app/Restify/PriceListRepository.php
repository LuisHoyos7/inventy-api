<?php

namespace App\Restify;

use App\Models\PriceList;
use Binaryk\LaravelRestify\Http\Requests\RestifyRequest;
use Binaryk\LaravelRestify\Repositories\Repository;
use Binaryk\LaravelRestify\Fields\BelongsTo;

class PriceListRepository extends Repository
{
    public static string $model = PriceList::class;

    public function fields(RestifyRequest $request): array
    {
        return [
            id(),


            // Relación "muchos a uno" con el modelo Article
            BelongsTo::make('Item', 'item', ItemRepository::class),
        ];
    }
}
