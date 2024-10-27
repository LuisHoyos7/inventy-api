<?php

namespace App\Models;

use App\Traits\HasCompany;
use App\Enums\InventoryMovementType;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryMovement extends Model
{
    use HasFactory, HasCompany;

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

    public function item() : BelongsTo
    {
        return $this->belongsTo(Item::class);
    }

    public function transaction() : BelongsTo
    {
        return $this->belongsTo(Transaction::class);
    }
}
