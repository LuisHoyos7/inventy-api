<?php

namespace App\Restify;

use App\Models\ItemType;
use Binaryk\LaravelRestify\Http\Requests\RestifyRequest;
use Binaryk\LaravelRestify\Repositories\Repository;
use Binaryk\LaravelRestify\Fields\HasMany;
use Binaryk\LaravelRestify\Filters\Matches;

class ItemTypeRepository extends Repository
{
    public static string $model = ItemType::class;

    public function fields(RestifyRequest $request): array
    {
        return [
            id(),
            // Relación "uno a muchos" con el modelo Items
            HasMany::make('Items', 'items', ItemRepository::class),
        ];
    }
}
