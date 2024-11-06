<?php

namespace App\Restify\Actions;

use Binaryk\LaravelRestify\Actions\Action;
use Binaryk\LaravelRestify\Http\Requests\ActionRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;

class SendBillingAction extends Action
{
    public function handle(ActionRequest $request, Collection $models): JsonResponse
    {
        return ok();
    }
}
