<?php

namespace App\Models;

use App\Traits\HasCompany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory, HasCompany;

    protected $fillable = [
        "identification",
        "fullname",
        "email",
        'is_customer',
        "is_supplier",
        "company_id"
    ];

    protected function casts(): array
    {
        return [
            'is_customer' => 'boolean',
            "is_supplier" => 'boolean',
        ];
    }
}
