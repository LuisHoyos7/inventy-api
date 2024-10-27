<?php

namespace App\Models;

use App\Enums\InventoryMovementType;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryMovement extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'quantity',
        'item_id',
        'transaction_id',
        'company_id'
    ];

    protected function casts(): array
    {
        return [
            'type' => InventoryMovementType::class,
        ];
    }

    // Define relationships with other models
    public function item() : BelongsTo
    {
        return $this->belongsTo(Item::class);
    }

    public function transaction() : BelongsTo
    {
        return $this->belongsTo(Transaction::class);
    }

    public function company() : BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
