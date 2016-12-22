<?php
namespace App\Transformer;

class ArticleCategoryTransformer extends Transformer
{

    public function transform($article)
    {
        return array_merge($this->allFillable($article), [
            'subLength' => $article->subLength
        ]);
    }
}