<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillingResolution extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'prefix',
        'code',
        'consecutive_start',
        'consecutive_end',
        'current_consecutive',
        'start_date',
        'due_date',
        'technical_key'
    ];

    protected $appends = [
        'consecutive',
        'is_active',
    ];

    public function getConsecutiveAttribute()
    {
        return "{$this->prefix}{$this->current_consecutive}";
    }

    public function getIsActiveAttribute()
    {
        return $this->due_date >= date('Y-m-d');
    }

    public function scopeActive($query, array $filters)
    {
        return $query
            ->whereColumn('consecutive_end', '>=', 'current_consecutive')
            ->where('type', $filters['type'] ?? 'FACTURA')
            ->where('due_date', '>=', date('Y-m-d'));
    }

    public function incrementConsecutive(): void
    {
        $this->current_consecutive += 1;
        $this->save();
    }
}
