<?php

namespace App\Models;

use App\Traits\HasCompany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    use HasFactory, HasCompany;

    protected $fillable = [
        "name",
        "description",
        "barcode",
        "initial_cost",
        "category_id",
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function itemType()
    {
        return $this->belongsTo(ItemType::class);
    }

    public function priceLists()
    {
        return $this->hasMany(PriceList::class);
    }

    public function invoiceDetails()
    {
        return $this->hasMany(InvoiceDetail::class);
    }
}
