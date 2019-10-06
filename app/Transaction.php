<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';
    protected $fillable = ['transaksi', 'pemasukan', 'pengeluaran', 'laundry_id'];

    public function laundry(){
        return $this->hasOne('App\Laundry', 'laundry_id');
    }
}
