<?php

namespace App\Enums;

enum TransactionsType: string
{
    case SALE = 'SALE';
    case PURCHASE = 'PURCHASE';
}
