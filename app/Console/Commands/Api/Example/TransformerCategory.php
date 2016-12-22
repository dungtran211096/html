<?php
namespace App\Transformer;

class _REPLACE_ocCategoryTransformer extends Transformer
{

    public function transform($_REPLACE_o)
    {
        return array_merge($this->allFillable($_REPLACE_o), [
            'subLength' => $_REPLACE_o->subLength
        ]);
    }
}