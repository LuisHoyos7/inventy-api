<?php

namespace App\Actions\Aliaddo;

use Illuminate\Support\Str;
use Lorisleiva\Actions\Concerns\AsAction;

class MakeBillingDetails
{
    use AsAction;

    public function handle($items)
    {
        $details = [];
        foreach ($items as $item) {
            $details[] = [
                'standardType' => '',
                'standardCode' => '',
                'itemCode' => $item->barcode,
                'itemName' => Str::limit(value: $item->name, limit: 200, end: ''),
                'itemModel' => '',
                'description' => $item->description,
                'brandName' => '',
                'itemCodeSupplier' => '',
                'isPresent' => false,
                'unitMeasurementCode' => 'EA',
                'unitMeasurementName' => '',
                'price' => (float) $item->pivot->price,
                'quantity' => (float) $item->pivot->quantity,
                'discounts' => [],
                'charges' => [],
                'taxes' => [],
                'withholdings' => [],
            ];
        }

        return $details;
    }
}
