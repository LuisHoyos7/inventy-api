<?php

namespace App\Actions\Aliaddo;

use App\Models\Contact;
use Lorisleiva\Actions\Concerns\AsAction;
use Stenfrank\DianDV\Facades\DV;

class MakeCustomer
{
    use AsAction;

    public function handle(Contact $contact)
    {
        return [
            'companyName' => $contact->fullname,
            'personType' => '2',
            'regimeType' => '49',
            'firstName' => $contact->fullname,
            'lastName' => $contact->fullname,
            'identification' => $contact->identification,
            'digitCheck' => (string) DV::getDV($contact->identification),
            'identificationTypeCode' => '13',
            'email' => $contact->email,
            'phone' => '',
            'merchantRegistration' => 'N/A',
            'responsibleFor' => '',
            'responsibilities' => 'R-99-PN',
            'economicActivities' => '',
            'billingAddress' => 'CR 01 # 2 - 3',
            'billingCountryName' => 'Colombia',
            'billingCountryCode' => 'CO',
            'billingRegionName' => 'BOGOTA',
            'billingRegionCode' => '11',
            'billingCityName' => 'BOGOTA',
            'billingCityCode' => '11001',
            'billingPostalCode' => '',
            'billingNeighborhood' => '',
            'billingPhone' => '',
            'billingContactName' => '',
            'shippingAddress' => '',
            'shippingCountryName' => '',
            'shippingCountryCode' => '',
            'shippingRegionName' => '',
            'shippingRegionCode' => '',
            'shippingCityName' => '',
            'shippingCityCode' => '',
            'shippingPostalCode' => '',
            'shippingNeighborhood' => '',
            'shippingPhone' => '',
            'shippingContactName' => '',
        ];
    }
}
