<?php

namespace App\Models;

use App\Enums\ItemType;
use App\Traits\HasCompany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Item extends Model
{
    use HasCompany, HasFactory;

    protected $fillable = [
        'name',
        'description',
        'barcode',
        'type',
        'initial_cost',
        'category_id',
        'company_id',
        'img',
        'profit',
        'stock',
    ];

    // protected $with = ['priceLists'];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'type' => ItemType::class,
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function priceLists(): BelongsToMany
    {
        return $this->belongsToMany(PriceList::class, 'item_price_list')
            ->withPivot('price')
            ->withTimestamps();
    }

    public function inventoryMovements(): HasMany
    {
        return $this->hasMany(InventoryMovement::class);
    }

    public function adjustStock(int $quantity): void
    {
        $this->stock += $quantity;
        $this->save();
    }
}
