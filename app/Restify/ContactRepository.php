<?php

namespace App\Restify;

use App\Models\Contact;
use Binaryk\LaravelRestify\Fields\BelongsTo;
use Binaryk\LaravelRestify\Http\Requests\RestifyRequest;

class ContactRepository extends Repository
{
    public static string $model = Contact::class;

    public function fields(RestifyRequest $request): array
    {
        return [
            field('identification')
                ->storingRules([
                    'required',
                    'string',
                    'min:3',
                    'max:255',
                    'unique:contacts,identification'
                ]),

                field('fullname')
                ->storingRules([
                    'required',
                    'string',
                    'min:3',
                    'max:255',
                ]),

                field('email')
                ->storingRules([
                     'required',
                     'string',
                     'email',
                     'max:255',
                     'unique:contacts,email'
                ]),

                field('is_customer')
                ->storingRules([
                    'boolean',
                ]),

                field('is_supplier')
                ->storingRules([
                     'boolean',
                ]),

        ];
    }

    public static function related(): array
    {
        return [
            'company' => BelongsTo::make('company'), // Relación con la tabla company
        ];
    }
}
