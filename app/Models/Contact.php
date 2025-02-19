<?php

namespace App\Models;

use App\Traits\HasCompany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Contact extends Model
{
    use HasCompany, HasFactory;

    protected $fillable = [
        'identification',
        'fullname',
        'email',
        'is_customer',
        'is_supplier',
        'company_id',
    ];

    protected function casts(): array
    {
        return [
            'is_customer' => 'boolean',
            'is_supplier' => 'boolean',
        ];
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }
}
