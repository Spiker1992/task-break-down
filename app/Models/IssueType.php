<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class IssueType extends Model
{
    public function scopeHasKey(Builder $builder, string $key): Builder
    {
        return $builder->where('key', $key);
    }
}
