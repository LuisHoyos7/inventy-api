<?php

namespace App\Models;
use App\Enums\ItemType;
use App\Traits\HasCompany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

}
