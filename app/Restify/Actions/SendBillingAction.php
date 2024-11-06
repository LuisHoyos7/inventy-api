<?php

namespace App\Restify\Actions;

use App\Actions\Aliaddo\BillingFactory;
use Binaryk\LaravelRestify\Actions\Action;
use Binaryk\LaravelRestify\Http\Requests\ActionRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;

class SendBillingAction extends Action
{
    public function handle(ActionRequest $request, Collection $models): JsonResponse
    {
        // Obtener transaction
        $transaction = $models->first();

        // crear json
        $billing = BillingFactory::run($transaction);

        return response()->json([
            'billing' => $billing
        ]);
    }
}
