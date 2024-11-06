<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class AliaddoService
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = config('services.aliaddo.api_url');
    }

    public function create($document, $data)
    {
        return Http::withHeaders([
            'x-api-key' => config('services.aliaddo.api_key'),
            'Content-Type' => 'application/json',
        ])->post("{$this->baseUrl}/{$document}", $data);
    }
}
