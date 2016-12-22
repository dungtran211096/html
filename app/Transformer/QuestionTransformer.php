<?php
namespace App\Transformer;

class QuestionTransformer extends Transformer
{

    public function transform($question)
    {
        return array_merge($this->allFillable($question), [

        ]);
    }
}