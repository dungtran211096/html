<?php

namespace App;

use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Cviebrock\EloquentSluggable\Sluggable;

class Article extends BaseModel
{
    use Sluggable, SluggableScopeHelpers;
    protected $table = 'articles';
    protected $fillable = [
        'title', 'image', 'image_name', 'active', 'name', 'content', 'excerpt', 'description', 'keyword', 'slug'
    ];

    public function categories()
    {
        return $this->belongsToMany(ArticleCategory::class, 'article_category_relations');
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
        Article::deleting(function ($article) {
            ArticleCategoryRelation::where('article_id', $Article['id'])->delete();
        });
    }
}
