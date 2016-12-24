<?php
namespace App\Transformer;

class UserTransformer extends Transformer
{

    public function transform($user)
    {
        return array_merge($this->allFillable($user), [
            'admin' => (bool)$user->admin,
            'data' => $user->data1,
            'is_5toter' => (bool)$user->is_5toter
        ]);
    }
}