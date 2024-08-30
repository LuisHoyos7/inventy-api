<?php

namespace App\Restify;

use App\Models\Category;
use App\Models\Item;
use Binaryk\LaravelRestify\Http\Requests\RestifyRequest;
use Binaryk\LaravelRestify\Repositories\Repository;
use Binaryk\LaravelRestify\Fields\BelongsTo;
use Binaryk\LaravelRestify\Fields\HasMany;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\Rule;

class ItemRepository extends Repository
{
    public static string $model = Item::class;

    public function fields(RestifyRequest $request): array
    {
        return [
            field('name')->rules('required', 'min:3', 'max:255'),
            field('description')->rules('nullable', 'max:255'),
            field('barcode')->rules('required', 'min:3', 'max:100'),
            field('initial_cost')->rules('required', 'numeric'),
            field('category_id')->rules('required', Rule::exists(Category::class, 'id')),

            // // Relación con ItemType
            // BelongsTo::make('Item Type', 'itemType', ItemTypeRepository::class),

            // // Relación con Category
            // BelongsTo::make('Category', 'category', CategoryRepository::class),

            // // Relación con PriceList
            // HasMany::make('Price Lists', 'priceLists', PriceListRepository::class),

            // // Relación con InvoiceDetail
            // HasMany::make('Invoice Details', 'invoiceDetails', InvoiceDetailRepository::class),
        ];
    }

    // public function store(RestifyRequest $request)
    // {
    //     // Personaliza la lógica de almacenamiento aquí
    //     $item = Item::create($request->all());

    //     //creamos la lista de precio por defecto
    //     PreciList::create([]);

    //     return rest($item)->indexMeta([]);
    // }
}
