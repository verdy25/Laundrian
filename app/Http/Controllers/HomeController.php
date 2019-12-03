<?php

namespace App\Http\Controllers;

use App\Exports\TransactionExport;
use App\Transaction;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\Request;
use Maatwebsite\Excel\Facades\Excel;


class HomeController extends Controller
{
    public function index(Request $request)
    {
        $transaksi = Transaction::all();
        $transaksi_bln = Transaction::whereMonth('created_at', Carbon::now()->month)->count();
        $pemasukan = Transaction::whereMonth('created_at', Carbon::now()->month)->sum('pemasukan');
        $pengeluaran = Transaction::whereMonth('created_at', Carbon::now()->month)->sum('pengeluaran');
        $pendapatan = $pemasukan - $pengeluaran;

        $today = Carbon::today();
        $transaksi_hr = Transaction::whereDay('created_at', $today)->count();
        $masukharian = Transaction::whereDay('created_at',  $today)->sum('pemasukan');
        $keluarharian = Transaction::whereDay('created_at',  $today)->sum('pengeluaran');
        $pendapatan_harian = $masukharian - $keluarharian;

        $bulans = [
            ['1', 'januari'], ['2', 'februari'], ['3', 'maret'], ['4', 'april'], ['5', 'mei'], ['6', 'juni'], ['7', 'juli'],
            ['8', 'agustus'], ['9', 'september'], ['10', 'oktober'], ['11', 'november'], ['12', 'desember']
        ];

        $tahuns = ['2018', '2019'];

        $thn = Transaction::whereYear('created_at', $tahuns);

        // if (request()->ajax()) {
        //     if (!empty($request->filter_gender)) {
        //         $data = DB::table('transaksi')
        //             ->select('created_at', 'id', 'transaksi', 'pemasukan', 'pengeluaran')
        //             ->whereMonth('created_at', $request->filter_month)
        //             ->whereYear('created_at', Carbon::now()->year)
        //             ->get();
        //     } else {
        //         $data = DB::table('transaksi')
        //             ->select('created_at', 'id', 'transaksi', 'pemasukan', 'pengeluaran')
        //             ->get();
        //     }
        //     return datatables()->of($data)->make(true);
        // }

        return view('index', compact(
            'transaksi',
            'transaksi_bln',
            'transaksi_hr',
            'pemasukan',
            'pengeluaran',
            'pendapatan',
            'pendapatan_harian',
            'bulans',
            'tahuns'
        ));
    }

    public function export(Request $request)
    {

        return Excel::download(new TransactionExport($request->bulan, $request->tahun), 'transaksi.xlsx');

        // return (new TransactionExport($request->bulan, $request->tahun))->download('transaksi.xlsx');
    }
}
