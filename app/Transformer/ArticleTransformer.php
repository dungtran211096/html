<?php
namespace App\Transformer;

class ArticleTransformer extends Transformer
{

    public function transform($article)
    {
        return array_merge($this->allFillable($article), [
            'categories' => $article->categories()->lists('article_category_id'),
            'categoryNames' => $article->categories()->lists('article_categories.name')
        ]);
    }
}