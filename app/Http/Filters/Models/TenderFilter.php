<?php

namespace App\Http\Filters\Models;

use App\Http\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class TenderFilter extends Filter
{
    protected function name(string $value): Builder
    {
        return $this->builder->where(function ($query) use ($value) {
            $query->where('name', 'like', $value . '%');
        });
    }

    protected function date(string $value): Builder
    {
        return $this->builder->whereDate('created_at', $value);
    }
}
