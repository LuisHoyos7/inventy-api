<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Invoice extends Model
{
    public function invoiceType()
    {
        return $this->belongsTo(invoiceType::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function invoiceDetails()
    {
        return $this->hasMany(InvoiceDetail::class);
    }
}
