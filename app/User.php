<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username', 'active', 'avatar', 'msv',
        'birthday', 'uni', 'school_year', 'faculty', 'dd_renluyen', 'ht_gpa',
        'is_5toter'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function data()
    {
        return $this->hasOne(UserData::class);
    }

    public function getData1Attribute()
    {
        $array = [
            'daoduc' => null,
            'hoctap' => null,
            'theluc' => null,
            'tinhnguyen' => null,
            'hoinhap' => null
        ];

        if ($b = $this->data) {
            $a = $b->toArray();
            foreach ($array as $key => $value) {
                if (@unserialize($a[$key])) {
                    $array[$key] = unserialize($a[$key]);
                }
            }
        }
        return $array;
    }

    public function setNewDataAttribute($newValue)
    {
        $a = $this->data;
        foreach ($newValue as $key => $value) {
            if (is_array($value)) {
                $a->$key = serialize($value);
            }
        }
        $a->save();
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function scopeToter($q)
    {
        return $q->where('is_5toter', 1);
    }

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
}
