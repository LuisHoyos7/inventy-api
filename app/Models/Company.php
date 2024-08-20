<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Observers\CompanyObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;

#[ObservedBy([CompanyObserver::class])]

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];
}
