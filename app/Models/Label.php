<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    public function scopeHasNames(Builder $builder, array $names): Builder
    {
        return $builder->whereIn('name', $names);
    }
}
