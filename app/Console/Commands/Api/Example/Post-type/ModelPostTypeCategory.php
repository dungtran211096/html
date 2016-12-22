<?php

namespace App;

use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Cviebrock\EloquentSluggable\Sluggable;

class _REPLACE_ocCategory extends BaseModel
{
    use Sluggable, SluggableScopeHelpers;

    protected $table = '_REPLACE_o_categories';
    protected $fillable = ['name', 'parent', 'slug', 'title', 'description', 'keyword', 'active'];

    public function scopeChild($query, $parentId)
    {
        return $query->where('parent', $parentId);
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function scopeParentCat($query)
    {
        return $query->where('id', $this->parent);
    }

    public function getParentCatAttribute()
    {
        return $this->parentCat()->first();
    }

    public function getSubLengthAttribute()
    {
        if ($this->parent == 0) {
            return 0;
        }
        return $this->parentCat->subLength + 1;
    }

    public static function boot()
    {
        parent::boot();
        _REPLACE_oc::deleting(function ($category) {
            _REPLACE_oc::child($category->id)->get()->each(function ($child) {
                $child->delete();
            });
            _REPLACE_ocCategoryRelation::where('category_id', $category['id'])->delete();
        });
    }

    public function _REPLACE_m()
    {
        return $this->belongsToMany(_REPLACE_oc::class, '_REPLACE_o_category_relations');
    }
}
