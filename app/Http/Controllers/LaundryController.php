<?php

namespace App\Http\Controllers;

use App\Laundry;
use App\Member;
use App\Package;
use App\Transaction;
use Illuminate\Http\Request;

class LaundryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laundries = Laundry::all();
        $members = Member::all();
        $packages = Package::all();
        return view('custlaundry.index', compact('laundries', 'members', 'packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $members = Member::all();
        $packages = Package::all();
        return view('custlaundry.create', compact('members', 'packages'));
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
            'member_id' => 'required',
            'package_id' => 'required',
            'pcs' => 'required'
        ]);

        $package = Package::find($request->package_id);
        $cost = $request->pcs * $package->harga;

        $laundry = new Laundry();
        $laundry->member_id = $request->member_id;
        $laundry->package_id = $request->package_id;
        $laundry->pcs = $request->pcs;
        $laundry->cost = $cost;
        $laundry->save();

        $id = $laundry->id;

        Transaction::create([
            'transaksi' => 'M' . $id,
            'pemasukan' => $cost,
            'pengeluaran' => 0
        ]);

        return redirect()->route('laundriin.index')->with('status', 'data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Laundry  $laundry
     * @return \Illuminate\Http\Response
     */
    public function show(Laundry $laundry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Laundry  $laundry
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $laundry = Laundry::findOrFail($id);
        $members = Member::findOrFail($laundry->members->id);
        $packages = Package::all();
        return view('custlaundry.edit', compact('laundry', 'members', 'packages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Laundry  $laundry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $laundry = Laundry::find($id);
        $request->validate([
            'member_id' => 'required',
            'package_id' => 'required',
            'pcs' => 'required'
        ]);

        $package = Package::find($request->package_id);
        $cost = $request->pcs * $package->harga;

        Laundry::where('id', $id)
            ->update([
                'member_id' => $request->member_id,
                'package_id' => $request->package_id,
                'pcs' => $request->pcs,
                'cost' => $cost
            ]);

        Transaction::where('transaksi', 'M' . $id)->update([
            'pemasukan' => $cost,
        ]);

        return redirect()->route('laundriin.index')->with('status', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Laundry  $laundry
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Laundry::destroy($id);
        Transaction::where('transaksi', 'M'.$id)->delete();
        return redirect()->route('laundriin.index')->with('status', 'Data telah dihapus');
    }
}
