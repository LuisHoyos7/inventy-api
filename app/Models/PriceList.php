<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class PriceList extends Model
{

    public function items(): BelongsToMany
    {
        return $this->belongsToMany(Item::class, 'item_price_list');
    }
}
