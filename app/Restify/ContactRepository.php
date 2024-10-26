<?php

namespace App\Restify;

use App\Models\Contact;
use Binaryk\LaravelRestify\Fields\BelongsTo;
use Binaryk\LaravelRestify\Http\Requests\RestifyRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ContactRepository extends Repository
{
    public static string $model = Contact::class;

    public static array $search = ['identification', 'fullname'];

    public function fields(RestifyRequest $request): array
    {
        return [
            field('identification')
                ->storingRules([
                    'required',
                    'min:8',
                    'max:20',
                    Rule::unique('contacts')
                        ->where(fn($query) => $query->where('company_id', Auth::user()->company_id)),
                ])

                ->updatingRules(
                    [
                        'required',
                        'min:8',
                        'max:20',
                        Rule::unique('contacts')
                            ->where(fn($query) => $query
                                ->where('company_id', Auth::user()->company_id))
                            ->ignore($this->id)
                    ]
                ),

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
            'company' => BelongsTo::make('company'),
        ];
    }
}
