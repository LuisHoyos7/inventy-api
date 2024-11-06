<?php

namespace App\Actions\Aliaddo;

use App\Models\BillingResolution;
use Lorisleiva\Actions\Concerns\AsAction;

class MakeResolution
{
    use AsAction;

    public function handle(BillingResolution $resolution): array
    {
        return [
            'resolutionKey' => $resolution->technical_key ?: "",
            'resolutionPrefix' => $resolution->prefix,
            'resolutionNumber' => $resolution->code ?:  (string) $resolution->id,
            'resolutionRangeInitial' => $resolution->consecutive_start,
            'resolutionRangeFinal' => $resolution->consecutive_end,
            'resolutionValidFrom' => $resolution->start_date,
            'resolutionValidUntil' => $resolution->due_date,
        ];
    }
}
