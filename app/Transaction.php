<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';
    protected $fillable = ['transaksi', 'pemasukan', 'pengeluaran'];

    public function laundry(){
        return $this->hasOne('App\Laundry', 'laundry_id');
    }
}
