<?php

namespace App;

use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Cviebrock\EloquentSluggable\Sluggable;

class School extends BaseModel
{
    use Sluggable, SluggableScopeHelpers;
    protected $table = 'schools';
    protected $fillable = ['name', 'active', 'slug'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
