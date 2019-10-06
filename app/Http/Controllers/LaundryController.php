<?php

namespace App\Http\Controllers;

use App\Laundry;
use App\Member;
use App\Package;
use App\PaymentStatus;
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
        $payment_status = PaymentStatus::all();
        return view('custlaundry.index', compact('laundries', 'members', 'packages', 'payment_status'));
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
        $payment_status = PaymentStatus::all();
        return view('custlaundry.create', compact('members', 'packages', 'payment_status'));
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
            'package_price' => 'required',
            'pcs' => 'required',
            'cost' => 'required',
            'payment_status_id' => 'required',
            'laundry_id' => 'nullable'
        ]);

        Laundry::create([
            'member_id' => $request->member_id,
            'package_price' => $request->package_price,
            'pcs' => $request->pcs,
            'cost' => $request->cost,
            'payment_status_id' => $request->payment_status_id
        ]);

        Transaction::create([
            'transaksi' => 'Transaksi laundry - '.$request->member_id,
            'pemasukan' => $request->cost,
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
        $members = Member::all();
        $packages = Package::all();
        $payment_status = PaymentStatus::all();
        return view('custlaundry.edit', compact('laundry', 'members', 'packages', 'payment_status'));
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
            'cost' => 'required',
            'payment_status_id' => 'required'
        ]);

        Laundry::where('id', $id)
            ->update([
                'member_id' => $request->member_id,
                'package_price' => $request->package_price,
                'pcs' => $request->pcs,
                'cost' => $request->cost,
                'payment_status_id' => $request->payment_status_id
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
