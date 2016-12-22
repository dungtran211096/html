<?php

namespace App;

use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Cviebrock\EloquentSluggable\Sluggable;

class Question extends BaseModel
{
    use Sluggable, SluggableScopeHelpers;
    protected $table = 'questions';
    protected $fillable = [
        'title', 'image', 'image_name', 'active', 'name', 'content', 'excerpt', 'description', 'keyword', 'slug'
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
