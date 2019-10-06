<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentStatus extends Model
{
    protected $table = 'payment_status';
    protected $guarded = [];

    public function laundry()
    {
        return $this->hasMany('App\Laundry', 'payment_status_id');
    }
}
