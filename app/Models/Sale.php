<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasCompany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Relations\HasOne;
class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'contact_id',
        'date',
        'total',
        'branch_id',
    ];


    public function contact(): BelongsTo
    {
        return $this->belongsTo(Contact::class);
    }

    public function items(): BelongsToMany
    {
        return $this->belongsToMany(Item::class, 'item_transaction')
            ->withPivot([
                'item_name',
                'quantity',
                'price',
                'total',
            ])
            ->withTimestamps();
    }

    public function inventoryMovements(): HasMany
    {
        return $this->hasMany(InventoryMovement::class);
    }

    public function billing(): HasOne
    {
        return $this->hasOne(Billing::class);
    }

    public function branch():BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

}
