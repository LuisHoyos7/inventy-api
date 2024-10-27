<?php

namespace App\Enums;

enum TransactionType: string
{
    case PRODUCT = 'SALE';
    case SERVICE = 'PURCHASE';
}
