<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserData extends BaseModel
{
	protected $table = 'user_data';
	protected $fillable = ['daoduc', 'hoctap', 'theluc', 'tinhnguyen', 'hoinhap'];

    public function user(){
        return $this->belongsTo(App/User::class);
    }
}
