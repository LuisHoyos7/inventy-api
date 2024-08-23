<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Invoice extends Model
{
    public function invoice_type()
    {
        return $this->belongsTo(invoiceType::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function invoice_detail()
    {
        return $this->hasMany(InvoiceDetail::class);
    }
}
