<?php

namespace App\Restify;

use App\Models\InvoiceType;
use Binaryk\LaravelRestify\Fields\HasMany;
use Binaryk\LaravelRestify\Http\Requests\RestifyRequest;
use Binaryk\LaravelRestify\Repositories\Repository;

class InvoiceTypeRepository extends Repository
{
    public static string $model = InvoiceType::class;

    public function fields(RestifyRequest $request): array
    {
        return [
            id(),

            // Relación "uno a muchos" con el modelo Invoice
            HasMany::make('Invoices', 'invoices', InvoiceRepository::class),
        ];
    }
}
