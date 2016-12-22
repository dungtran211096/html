<?php
namespace App\Transformer;

class SchoolTransformer extends Transformer
{

    public function transform($school)
    {
        return array_merge($this->allFillable($school), [

        ]);
    }
}