<?php

namespace App\Restify;

use App\Models\ArticleType;
use Binaryk\LaravelRestify\Http\Requests\RestifyRequest;
use Binaryk\LaravelRestify\Repositories\Repository;
use Binaryk\LaravelRestify\Filters\Matches;

class ArticleTypeRepository extends Repository
{
    public static string $model = ArticleType::class;

    public function fields(RestifyRequest $request): array
    {
        return [
            id(),

          // Relación "uno a muchos" con el modelo Article
          HasMany::make('Articles', 'article', ArticleRepository::class),
      ];
  }

 
}
