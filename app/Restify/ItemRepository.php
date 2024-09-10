<?php

namespace App\Restify;

use App\Enums\ItemType;
use App\Models\Category;
use App\Models\Item;
use Binaryk\LaravelRestify\Fields\BelongsTo;
use Binaryk\LaravelRestify\Http\Requests\RestifyRequest;
use Binaryk\LaravelRestify\Repositories\Repository;
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
            field('barcode')->rules('required', 'min:3', 'max:100'),
            field('type')
                ->rules('required', Rule::enum(ItemType::class))
                ->messages([
                    'required' => 'El tipo es requerido.',
                ]),
            field('initial_cost')->rules('nullable', 'numeric'),
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
        ];
    }
}
