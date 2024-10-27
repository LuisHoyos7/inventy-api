<?php

namespace App\Restify;

use App\Enums\TransactionStatus;
use App\Enums\TransactionsType;
use App\Models\Contact;
use App\Models\Transaction;
use Binaryk\LaravelRestify\Fields\BelongsTo;
use Binaryk\LaravelRestify\Fields\BelongsToMany;
use Binaryk\LaravelRestify\Http\Requests\RestifyRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class TransactionRepository extends Repository
{
    public static string $model = Transaction::class;

    public function fields(RestifyRequest $request): array
    {
        return [
            field('type')
                ->rules([
                    'required',
                    Rule::enum(TransactionsType::class),
                ]),
            field('contact_id')
                ->rules([
                    'required',
                    Rule::exists(Contact::class, 'id')
                        ->where(fn($query) => $query->where('company_id', Auth::user()->company_id))
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
            field('status')
                ->rules([
                    'nullable',
                    Rule::enum(TransactionStatus::class),
                ]),
        ];
    }

    public static function related(): array
    {
        return [
            'company' => BelongsTo::make('company'),
            'contact' => BelongsTo::make('contact'),
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
}
