<?php

namespace App;

class Option extends BaseModel
{
    protected $table = 'options';
    protected $fillable = ['name', 'value'];

    public function scopeName($query, $name)
    {
        return $query->where('name', $name);
    }
}
