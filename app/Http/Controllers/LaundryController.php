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
        $laundries = Laundry::paginate(10);
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
        $member = Member::find($request->member_id);

        Laundry::create([
            'member_id' => $request->member_id,
            'package_id' => $request->package_id,
            'pcs' => $request->pcs,
            'cost' => $cost
        ]);

        Transaction::create([
            'transaksi' => 'Transaksi laundry '.$member->nama,
            'pemasukan' => $cost,
            'pengeluaran' => 0,
            'laundry_id' => $request->id
        ]);

        return redirect('/laundriin')->with('status', 'data berhasil ditambahkan');
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
            'package_price' => 'required',
            'pcs' => 'required',
            'cost' => 'required'
        ]);

        Laundry::where('id', $id)
            ->update([
                'member_id' => $request->member_id,
                'package_price' => $request->package_price,
                'pcs' => $request->pcs,
                'cost' => $request->cost
            ]);
        return redirect('/laundriin')->with('status', 'Data berhasil diperbarui');
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
        return redirect('/laundriin')->with('status', 'Data telah dihapus');
    }
}
