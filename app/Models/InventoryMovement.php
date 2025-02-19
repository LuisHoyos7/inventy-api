<?php

namespace App\Models;

use App\Enums\InventoryMovementType;
use App\Traits\HasCompany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InventoryMovement extends Model
{
    use HasCompany, HasFactory;

    protected $fillable = [
        'type',
        'quantity',
        'item_id',
        'transaction_id',
        'company_id',
    ];

    protected function casts(): array
    {
        return [
            'type' => InventoryMovementType::class,
        ];
    }

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }

    public function transaction(): BelongsTo
    {
        return $this->belongsTo(Transaction::class);
    }
}
