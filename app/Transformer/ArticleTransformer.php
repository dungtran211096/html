<?php
namespace App\Transformer;

class ArticleTransformer extends Transformer
{

    public function transform($article)
    {
        return array_merge($this->allFillable($article), [

        ]);
    }
}