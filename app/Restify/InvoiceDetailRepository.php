<?php

namespace App\Restify;

use App\Models\InvoiceDetail;
use Binaryk\LaravelRestify\Fields\BelongsTo;
use Binaryk\LaravelRestify\Http\Requests\RestifyRequest;
use Binaryk\LaravelRestify\Repositories\Repository;

class InvoiceDetailRepository extends Repository
{
    public static string $model = InvoiceDetail::class;

    public function fields(RestifyRequest $request): array
    {
        return [
            id(),

            // Relación "muchos a uno" con el modelo Invoice
            BelongsTo::make('Invoice', 'invoice', InvoiceRepository::class),

            // Relación "muchos a uno" con el modelo Article
            BelongsTo::make('Article', 'article', ItemRepository::class),

        ];
    }
}
