<?php

namespace App\Traits;

use App\Models\Company;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

trait HasCompany
{
    public static function bootHasCompany()
    {
        if (Auth::check()) {
            static::creating(function ($model) {
                $model->company_id = Auth::user()->company_id;
            });

            static::addGlobalScope('company_id', function (Builder $builder) {
                return $builder->where($builder->getModel()->getTable().'.company_id', Auth::user()->company_id);
            });
        }
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
