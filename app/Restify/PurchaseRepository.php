<?php

namespace App\Restify;


use App\Models\Purchase;
use Binaryk\LaravelRestify\Http\Requests\RestifyRequest;
use App\Models\Contact;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Restify\Actions\SendBillingAction;
use Binaryk\LaravelRestify\Fields\BelongsTo;
use Binaryk\LaravelRestify\Fields\BelongsToMany;
use Binaryk\LaravelRestify\Fields\HasOne;
class PurchaseRepository extends Repository
{
    public static string $model = Purchase::class;

    public function fields(RestifyRequest $request): array
    {
        return [
            field('contact_id')
            ->rules([
                'required',
                Rule::exists(Contact::class, 'id')
                  -> where(fn($query)=>$query->where('company_id', Auth::user()->company_id))
            ])
            ->messages([
                'required' => 'El contacto es requerido',
                'exists' => 'El contacto no existe',
            ]),

            field('date')
                ->rules([
                    'required',
                    'date',
                ]),
            field('total')
                ->rules([
                    'nullable',
                    'numeric',
                ]),

        ];
    }

    public static function related(): array
    {
        return [
            'company' => BelongsTo::make('company'),
            'contact' => BelongsTo::make('contact'),
            'billing' => HasOne::make('billing'),
            'items' => BelongsToMany::make('items', ItemRepository::class)->withPivot(
                [
                    field('item_name')->rules(['required']),
                    field('quantity')->rules(['required', 'numeric']),
                    field('price')->rules(['required', 'numeric']),
                    field('total')->rules(['required', 'numeric']),
                ]
            ),
        ];
    }

    public function actions(RestifyRequest $request): array
    {
        return [
            SendBillingAction::new(),
        ];
    }
}
