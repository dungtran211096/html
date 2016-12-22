<?php

namespace App;

use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Cviebrock\EloquentSluggable\Sluggable;

class _REPLACE_oc extends BaseModel
{
    use Sluggable, SluggableScopeHelpers;
    protected $table = '_REPLACE_m';
    protected $fillable = [
        'title', 'image', 'image_name', 'active', 'name', 'content', 'excerpt', 'description', 'keyword', 'slug'
    ];

    public function categories()
    {
        return $this->belongsToMany(_REPLACE_ocCategory::class, '_REPLACE_o_category_relations');
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public static function boot()
    {
        parent::boot();
        _REPLACE_oc::deleting(function ($_REPLACE_o) {
            _REPLACE_ocCategoryRelation::where('_REPLACE_o_id', $_REPLACE_oc['id'])->delete();
        });
    }
}
