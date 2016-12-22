<?php

namespace App;

class _REPLACE_ocCategoryRelation extends BaseModel
{
    protected $table = '_REPLACE_o_category_relations';
    protected $fillable = ['_REPLACE_o_id', '_REPLACE_o_category_id'];

    public function _REPLACE_o()
    {
        return $this->belongsTo(_REPLACE_oc::class);
    }

    public function category()
    {
        return $this->belongsTo(_REPLACE_ocCategory::class);
    }
}
