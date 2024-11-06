<?php

namespace App\Actions\Aliaddo;

use App\Models\BillingResolution;
use App\Models\Transaction;
use Lorisleiva\Actions\Concerns\AsAction;

class BillingFactory
{
    use AsAction;

    public function handle(Transaction $transaction, BillingResolution $resolution)
    {
        $invoice['code'] = '01';
        $invoice['format'] = 'Estandar';
        $invoice['emailSender'] = '';
        $invoice['consecutive'] = $resolution->current_consecutive;
        $invoice['externalNumber'] = '';
        $invoice['currencyCode'] = 'COP';
        $invoice['currencyRate'] = 0;
        $invoice['date'] = $transaction->date;
        $invoice['dateDue'] = $transaction->date;
        $invoice['dateStart'] = '';
        $invoice['dateEnd'] = '';
        $invoice['typeOfOperation'] = '10';
        $invoice['incoterms'] = '';
        $invoice['deliveryTerms'] = '';
        $invoice['terms'] = '';
        $invoice['remark'] = '';
        $invoice['observation'] = '';

        $invoice['termDay'] = 0;

        $invoice['paymentMeanCode'] = '10';
        $invoice['branch'] = MakeBranch::run();
        $invoice['resolution'] = MakeResolution::run($resolution);
        $invoice['customer'] = MakeCustomer::run($transaction->contact);

        $invoiceDetails = MakeBillingDetails::run($transaction->items);
        $subtotal = CalculateBillingSubtotal::run($invoiceDetails);

        $invoice['invoiceDetails'] = $invoiceDetails;
        $invoice['totals']['prepaymentAmount'] = 0;
        $invoice['totals']['amount'] = $subtotal;
        $invoice['discounts'] = [];
        $invoice['charges'] = [];
        $invoice['customFields'] = [];

        return $invoice;
    }
}
