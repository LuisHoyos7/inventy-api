<?php

namespace App\Models;

use App\Enums\TransactionType;
use App\Traits\HasCompany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory, HasCompany;

    protected $fillable = [
        'contact_id',
        'type',
        'date',
        'total',
        'company_id'
    ];

    protected function casts(): array
    {
        return [
            'type' => TransactionType::class,
        ];
    }
}
