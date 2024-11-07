<?php

namespace App\Restify;

use App\Models\Billing;
use Binaryk\LaravelRestify\Http\Requests\RestifyRequest;

class BillingRepository extends Repository
{
    public static string $model = Billing::class;

    public function fields(RestifyRequest $request): array
    {
        return [
            id(),
            field('code'),
            field('cufe'),
            field('pdf_link'),
            field('qrcode'),
        ];
    }
}
