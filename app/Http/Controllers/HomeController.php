<?php

namespace App\Http\Controllers;

use App\Transaction;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $transaksi = Transaction::paginate(10);
        $transaksi_bln = Transaction::whereMonth('created_at', Carbon::now()->month)->count();
        // $pemasukan = Transaction::where('payment_status_id', 1)->sum('pemasukan');
        $pemasukan = Transaction::whereMonth('created_at', Carbon::now()->month)->sum('pemasukan');
        $pengeluaran = Transaction::whereMonth('created_at', Carbon::now()->month)->sum('pengeluaran');
        $pendapatan = $pemasukan - $pengeluaran;

        $today = Carbon::today();
        $transaksi_hr = Transaction::whereDay('created_at', $today)->count();
        $masukharian = Transaction::whereDay('created_at',  $today)->sum('pemasukan');
        $keluarharian = Transaction::whereDay('created_at',  $today)->sum('pengeluaran');
        $pendapatan_harian = $masukharian - $keluarharian;
        return view('index', compact(
            'transaksi',
            'transaksi_bln',
            'transaksi_hr',
            'pemasukan',
            'pengeluaran',
            'pendapatan',
            'pendapatan_harian'
        ));
    }
}
