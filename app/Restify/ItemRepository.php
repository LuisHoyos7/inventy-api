<?php

namespace App\Restify;

use App\Enums\ItemType;
use App\Models\Category;
use App\Models\Item;
use Binaryk\LaravelRestify\Fields\BelongsTo;
use Binaryk\LaravelRestify\Fields\BelongsToMany;
use Binaryk\LaravelRestify\Http\Requests\RestifyRequest;
use Binaryk\LaravelRestify\Repositories\Repository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ItemRepository extends Repository
{
    public static string $model = Item::class;
    public static array $search = ['name', 'description', 'barcode'];

    public function fields(RestifyRequest $request): array
    {
        return [
            field('name')->rules('required', 'min:3', 'max:255'),
            field('description')->rules('nullable', 'max:255'),
            field('barcode')->rules('required', 'min:3', 'max:100')
                ->storingRules(Rule::unique('items')
                ->where(fn($query) => $query->where('company_id', Auth::user()->company_id)))
                ->updatingRules(Rule::unique('items')
                ->where(fn($query) => $query
                ->where('company_id', Auth::user()->company_id))
                ->ignore($this->id)),
            field('type')
                ->rules('required', Rule::enum(ItemType::class))
                ->messages([
                    'required' => 'El tipo es requerido.',
                ]),
            field('initial_cost')->rules('nullable', 'numeric'),
            field('img')->image()
                ->path($request->user()->company_id . '-item-images'),
            field('category_id')
                ->rules('nullable', Rule::exists(Category::class, 'id'))
                ->messages([
                    'required' => 'La categoría es requerida',
                    'exists' => 'La categoría escogida no es válida.',
                ]),
        ];
    }

    public static function related(): array
    {
        return [
            'category' => BelongsTo::make('category'),
            'priceLists' => BelongsToMany::make('priceLists', PriceListRepository::class)
                ->withPivot(
                    field('id'),
                    field('item_id'),
                    field('price_list_id'),
                    field('price')
                )
                ->attachCallback(function ($request, $repository, $item) {
                    $item->priceLists()->attach($request->price_list_id, 
                        ['price' => $request->price ? $request->price : 0]);
                }),
        ];
    }
}
