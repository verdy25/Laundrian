<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $guarded = [];

    public function packages()
    {
        return $this->hasMany('App\Package', 'type_id');
    }
}
