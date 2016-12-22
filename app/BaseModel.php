<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function scopeInActive($query)
    {
        return $query->where('active', 0);
    }

    public function scopeSort($query, $sortBy = 'ASC')
    {
        return $query->orderBy('sort', $sortBy);
    }

    public function scopeOrderDate($query, $sort = 'DESC')
    {
        return $query->orderBy('created_at', $sort);
    }

    public function scopeHasCol($query, $has)
    {
        return $query->where($has, '<>', 0);
    }
}
