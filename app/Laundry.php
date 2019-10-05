<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laundry extends Model
{
    protected $table = 'launders';
    protected $guarded = [];

    public function members()
    {
        return $this->belongsTo('App\Member', 'member_id');
    }

    public function packages()
    {
        return $this->belongsTo('App\Package', 'package_id');
    }

    public function status()
    {
        return $this->belongsTo('App\PaymentStatus', 'payment_status_id');
    }
}
