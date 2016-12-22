<?php

namespace App;

use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Cviebrock\EloquentSluggable\Sluggable;

class ArticleCategory extends BaseModel
{
    use Sluggable, SluggableScopeHelpers;

    protected $table = 'article_categories';
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
        ArticleCategory::deleting(function ($category) {
            ArticleCategory::child($category->id)->get()->each(function ($child) {
                $child->delete();
            });
            ArticleCategoryRelation::where('category_id', $category['id'])->delete();
        });
    }

    public function articles()
    {
        return $this->belongsToMany(Article::class, 'article_category_relations');
    }
}
