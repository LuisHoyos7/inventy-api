<?php 

namespace App\Models;

use App\Enums\TransactionStatus;
use App\Enums\TransactionsType;
use App\Observers\TransactionObserver;
use App\Traits\HasCompany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
#[ObservedBy([TransactionObserver::class])]
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
}
