<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $guarded = [];

    public function laundry()
    {
        return $this->hasMany('App\Laundry', 'id');
    }
}
