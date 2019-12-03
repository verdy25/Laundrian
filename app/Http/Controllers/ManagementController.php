<?php

namespace App\Http\Controllers;

use App\Management;
use App\Transaction;
use Illuminate\Http\Request;

class ManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $managements = Management::all();
        return view('management.index', [
            'managements' => $managements
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('management.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jumlah' => 'required|numeric',
            'nominal' => 'required|numeric'
        ]);

        // Management::create($request->all());
        $management = new Management();
        $management->nama = $request->nama;
        $management->jumlah = $request->jumlah;
        $management->nominal = $request->nominal;
        $management->save();

        $id = $management->id;

        Transaction::create([
            'transaksi' => 'K' . $id,
            'pemasukan' => 0,
            'pengeluaran' => $request->nominal * $request->jumlah
        ]);
        return redirect()->route('management.index')->with('status', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Management  $management
     * @return \Illuminate\Http\Response
     */
    public function show(Management $management)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Management  $management
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $management = Management::findOrFail($id);
        return view('management.edit', [
            'management' => $management
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Management  $management
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Management $management)
    {
        $request->validate([
            'nama' => 'required',
            'jumlah' => 'required|numeric',
            'nominal' => 'required|numeric'
        ]);

        Management::where('id', $management->id)
            ->update([
                'nama' => $request->nama,
                'jumlah' => $request->jumlah,
                'nominal' => $request->nominal
            ]);

        Transaction::where('transaksi', 'K' . $management->id)->update([
            'pengeluaran' => $request->jumlah * $request->nominal,
        ]);

        return redirect()->route('management.index')->with('status', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Management  $management
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Management::destroy($id);
        Transaction::where('transaksi', 'K' . $id)->delete();
        return redirect()->route('management.index')->with('status', 'Data telah dihapus');
    }
}
