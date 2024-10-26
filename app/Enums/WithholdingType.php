<?php

namespace App\Enums;

enum WithholdingType: string
{
    case RENTA = 'RETENCION EN RENTA';
    case RETEIVA = 'RETENCION EN IVA';
    case RETEICA = 'RETENCION EN ICA';
    case RETENCION_TIMBRE = 'RETENCION EN TIMBRE NACIONAL';
}