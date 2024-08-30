<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Observers\CompanyObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[ObservedBy([CompanyObserver::class])]
class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function categories(): HasMany
    {
        return $this->hasMany(Category::class);
    }

    public function branches(): HasMany
    {
        return $this->hasMany(Branch::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }
}
