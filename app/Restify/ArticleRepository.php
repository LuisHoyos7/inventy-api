<?php

namespace App\Restify;

use App\Models\Article;
use Binaryk\LaravelRestify\Http\Requests\RestifyRequest;
use Binaryk\LaravelRestify\Repositories\Repository;
use Binaryk\LaravelRestify\Fields\BelongsTo;
use Binaryk\LaravelRestify\Fields\HasMany;

class ArticleRepository extends Repository
{
    public static string $model = Article::class;

    public function fields(RestifyRequest $request): array
    {
        return [
            id(),

            // Relación con ArticleType
            BelongsTo::make('Article Type', 'article_type', ArticleTypeRepository::class),

            // Relación con Category
            BelongsTo::make('Category', 'category', CategoryRepository::class),

            // Relación con PriceList
            HasMany::make('Price List', 'price_list', PriceListRepository::class),

            // Relación con InvoiceDetail
            HasMany::make('Invoice Detail', 'invoice_detail', InvoiceDetailRepository::class),
       
        ];
    }
}
