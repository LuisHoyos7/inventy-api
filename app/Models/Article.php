<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function article_type()
    {
        return $this->belongsTo(ArticleType::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function price_list()
    {
        return $this->hasMany(PriceList::class);
    }

    public function invoice_detail()
    {
        return $this->hasMany(InvoiceDetail::class);
    }


}
