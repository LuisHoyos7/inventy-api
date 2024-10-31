<?php

namespace App\Restify;

use App\Enums\ItemType;
use App\Models\Category;
use App\Models\Item;
use Binaryk\LaravelRestify\Fields\BelongsTo;
use Binaryk\LaravelRestify\Fields\BelongsToMany;
use Binaryk\LaravelRestify\Fields\HasMany;
use Binaryk\LaravelRestify\Http\Requests\RestifyRequest;
use Binaryk\LaravelRestify\Repositories\Repository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;


class ItemRepository extends Repository
{
    public static string $model = Item::class;
    public static array $search = ['name', 'description', 'barcode'];

    public static array $match = [
        'stock' => 'int',
    ];

    public function fields(RestifyRequest $request): array
    {
        return [
            field('name')
                ->storingRules([
                    'required_without:img',
                    'min:3',
                    'max:255',
                ]),
            field('description')
                ->rules([
                    'nullable',
                    'max:255',
                ]),
            field('barcode')
                ->storingRules(
                    [
                        'required_without:img',
                        'min:3',
                        'max:100',
                        Rule::unique('items')
                            ->where(fn($query) => $query->where('company_id', Auth::user()->company_id)),
                    ]
                )
                ->updatingRules(
                    [
                        Rule::unique('items')
                            ->where(fn($query) => $query
                                ->where('company_id', Auth::user()->company_id))
                            ->ignore($this->id)
                    ]
                ),
            field('type')
                ->storingRules([
                    'required_without:img',
                    Rule::enum(ItemType::class)
                ])
                ->messages([
                    'required' => 'El tipo es requerido.',
                ]),
            field('initial_cost')
                ->rules([
                    'nullable',
                    'numeric',
                    'regex:/^\d{1,18}(\.\d{1,2})?$/',  // Validar el formato decimal (hasta 18 enteros y 2 decimales)
                    'between:0,999999999999999999.99', // Validar el rango de valores posibles para decimal(20,2)
                ]),
            field('profit')
                ->rules([
                    'nullable',
                    'numeric',
                    'regex:/^\d{1,6}(\.\d{1,2})?$/',  // Validar el formato decimal (hasta 6 enteros y 2 decimales)
                    'between:0,999999.99', // Validar el rango de valores posibles para decimal(8,2)
                ]),
            field('img')
                ->image()
                ->path($request->user()->company_id . '-item-images'),
            field('category_id')
                ->rules([
                    'nullable',
                    Rule::exists(Category::class, 'id')
                ])
                ->messages([
                    'required' => 'La categoría es requerida',
                    'exists' => 'La categoría escogida no es válida.',
                ]),
            field('stock')
        ];
    }

    public static function related(): array
    {
        return [
            'company' => BelongsTo::make('company'),
            'category' => BelongsTo::make('category'),
            'inventoryMovements' => HasMany::make('inventoryMovements'),
            'priceLists' => BelongsToMany::make(
                'priceLists',
                PriceListRepository::class
            )
                ->withPivot(field('price'))
                ->attachCallback(function ($request, $repository, $item) {
                    $request->validate([
                        'price' => [
                            'required',
                            'numeric',
                            'regex:/^\d{1,18}(\.\d{1,2})?$/',  // Validar el formato decimal (hasta 18 enteros y 2 decimales)
                            'between:0,999999999999999999.99', // Validar el rango de valores posibles para decimal(20,2)
                        ],
                    ]);
                    if ($item->priceLists()->exists()) {
                        $item->priceLists()->updateExistingPivot($request->price_list_id, [
                            'price' => $request->price,
                        ]);
                    } else {
                        $item->priceLists()->attach(
                            $request->price_list_id,
                            ['price' => $request->price ?: 0]
                        );
                    }
                })
                ->detachCallback(function ($request, $repository, $item) {
                    $item->priceLists()->detach($request->price_list_id);
                }),
        ];
    }
}
