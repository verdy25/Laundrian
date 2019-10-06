<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $guarded = [];
    
    public function types()
    {
        return $this->belongsTo('App\Type', 'type_id');
    }

    public function laundry()
    {
        return $this->hasMany('App\Laundry', 'package_id');
    }
}
