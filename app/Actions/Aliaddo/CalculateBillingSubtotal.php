<?php

namespace App\Actions\Aliaddo;

use Lorisleiva\Actions\Concerns\AsAction;

class CalculateBillingSubtotal
{
    use AsAction;

    public function handle($billingDetails)
    {
        $subtotal = 0;

        foreach ($billingDetails as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }

        return round($subtotal, 4);
    }
}
