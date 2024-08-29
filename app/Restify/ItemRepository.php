<?php

namespace App\Restify;

use App\Models\Item;
use Binaryk\LaravelRestify\Http\Requests\RestifyRequest;
use Binaryk\LaravelRestify\Repositories\Repository;
use Binaryk\LaravelRestify\Fields\BelongsTo;
use Binaryk\LaravelRestify\Fields\HasMany;
use Illuminate\Http\JsonResponse;

class ItemRepository extends Repository
{
    public static string $model = Item::class;

    public function fields(RestifyRequest $request): array
    {
        return [
            id(),
            field('name')->rules('required'),
            field('description'),
            field('barcode'),
            field('initial_cost')->rules('required'),
            field('category_id'),

            // Relación con ItemType
            BelongsTo::make('Item Type', 'itemType', ItemTypeRepository::class),

            // Relación con Category
            BelongsTo::make('Category', 'category', CategoryRepository::class),

            // Relación con PriceList
            HasMany::make('Price Lists', 'priceLists', PriceListRepository::class),

            // Relación con InvoiceDetail
            HasMany::make('Invoice Details', 'invoiceDetails', InvoiceDetailRepository::class),
        ];
    }

    public function store(RestifyRequest $request)
    {
        // Personaliza la lógica de almacenamiento aquí
        $item = Item::create($request->all());

        //creamos la lista de precio por defecto
        PreciList::create([]);

        return rest($item)->indexMeta([]);
    }
}
