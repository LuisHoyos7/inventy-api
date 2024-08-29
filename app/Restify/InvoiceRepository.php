<?php

namespace App\Restify;

use App\Models\Invoice;
use Binaryk\LaravelRestify\Http\Requests\RestifyRequest;
use Binaryk\LaravelRestify\Repositories\Repository;
use Binaryk\LaravelRestify\Fields\BelongsTo;
use Binaryk\LaravelRestify\Fields\HasMany;

class InvoiceRepository extends Repository
{
    public static string $model = Invoice::class;

    public function fields(RestifyRequest $request): array
    {
        return [
            id(),


            // Relación "muchos a uno" con el modelo InvoiceType
            BelongsTo::make('Invoice Type', 'invoiceType', InvoiceTypeRepository::class),

            // Relación "muchos a uno" con el modelo User
            BelongsTo::make('User', 'user', UserRepository::class),

            // Relación "uno a muchos" con el modelo InvoiceDetail
            HasMany::make('Invoice Details', 'invoiceDetails', InvoiceDetailRepository::class),
        ];
    }
}
