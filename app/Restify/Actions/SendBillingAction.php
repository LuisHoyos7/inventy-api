<?php

namespace App\Restify\Actions;

use App\Actions\Aliaddo\BillingFactory;
use App\Models\Billing;
use App\Models\BillingResolution;
use Binaryk\LaravelRestify\Actions\Action;
use Binaryk\LaravelRestify\Http\Requests\ActionRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SendBillingAction extends Action
{
    public function handle(ActionRequest $request, Collection $models): JsonResponse
    {
        // Obtener transaction
        $transaction = $models->first();
        $resolution = BillingResolution::first();
        // crear json
        $billingData = BillingFactory::run($transaction, $resolution);

        $baseUrl = config('services.aliaddo.api_url');
        $response = Http::withHeaders([
            'x-api-key' => config('services.aliaddo.api_key'),
            'Content-Type' => 'application/json',
        ])->post("{$baseUrl}/invoice/test", $billingData);

        Log::info('resp status', ['status' => $response->status()]);
        Log::info('resp data', ['data' => $response->json()]);

        if ($response->failed()) {
            return response()->json([
                'message' => 'No se ha podido crear el documento electrónico',
                'ok' => $response->successful(),
                'http_status_code' => $response->status(),
                'data' => $response->json(),
                'billing_data' => $billingData,
            ], $response->status());
        }

        $responseData = $response->json();

        $billing = Billing::create([
            'data' => $billingData,
            'transaction_id' => $transaction->id,
            'code' => $resolution->consecutive,
            'cufe' => isset($responseData['cufe']) ? $responseData['cufe'] : null,
            'pdf_link' => isset($responseData['urlPdf']) ? $responseData['urlPdf'] : null,
            'qrcode' => isset($responseData['qr']) ? $responseData['qr'] : null,
        ]);

        $resolution->incrementConsecutive();

        return response()->json([
            'ok' => $response->successful(),
            'http_status_code' => $response->status(),
            'data' => $response->json(),
            'billing' => $billing,
        ], $response->status());
    }
}
