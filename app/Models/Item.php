<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        "name",
        "description",
        "barcode",
        "initial_cost",
        "category_id",
    ];

    public function itemType()
    {
        return $this->belongsTo(ItemType::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
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
