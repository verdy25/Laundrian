<?php

namespace App\Exports;

use App\Transaction;
use Maatwebsite\Excel\Concerns\FromQuery;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class TransactionExport implements FromQuery
{
    use Exportable;

    public function __construct(int $bulan, int $tahun)
    {
        $this->bulan = $bulan;
        $this->tahun = $tahun;
    }

    public function query()
    {
        return Transaction::query()->whereMonth('created_at', $this->bulan)->whereYear('created_at', $this->tahun);
    }

    // public function view(): View
    // {
    //     $transaksi = Transaction::whereMonth('created_at', $this->bulan)->whereYear('created_at', $this->tahun)->get();
    //     return view('excel', compact($transaksi));
    // }
}
