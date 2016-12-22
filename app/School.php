<?php

namespace App;

class School extends BaseModel
{
    protected $table = 'schools';
    protected $fillable = ['name', 'active', 'slug'];
}
