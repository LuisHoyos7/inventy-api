<?php

namespace App\Models;

use App\Enums\TransactionStatus;
use App\Enums\TransactionsType;
use App\Traits\HasCompany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory, HasCompany;

    protected $fillable = [
        'contact_id',
        'type',
        'date',
        'total',
        'status',
        'company_id',
    ];

    protected function casts(): array
    {
        return [
            'type' => TransactionsType::class,
            'status' => TransactionStatus::class,
        ];
    }

    public function contact(): BelongsTo
    {
        return $this->belongsTo(Contact::class);
    }
}
