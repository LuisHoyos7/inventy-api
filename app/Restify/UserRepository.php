<?php

namespace App\Restify;

use App\Models\User;
use Binaryk\LaravelRestify\Fields\BelongsTo;
use Binaryk\LaravelRestify\Http\Requests\RestifyRequest;

class UserRepository extends Repository
{
    public static string $model = User::class;

    public function fields(RestifyRequest $request): array
    {
        return [
            field('name')->rules('required'),
            field('email')
                ->storingRules('required', 'unique:users')
                ->messages(messages: [
                    'required' => 'This field is required.',
                ]),
        ];
    }

    public static function related(): array
    {
        return [
            'company' => BelongsTo::make('company'),
        ];
    }

    public static function indexQuery(RestifyRequest $request, $query)
{
    return $query->where('branch_id', $request->user()->branch_id);
}
}
