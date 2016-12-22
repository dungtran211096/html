<?php

namespace App;

class ArticleCategoryRelation extends BaseModel
{
    protected $table = 'article_category_relations';
    protected $fillable = ['article_id', 'article_category_id'];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    public function category()
    {
        return $this->belongsTo(ArticleCategory::class);
    }
}
