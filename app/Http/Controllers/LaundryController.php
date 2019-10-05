<?php

namespace App\Http\Controllers;

use App\Laundry;
use App\Member;
use App\Package;
use App\PaymentStatus;
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
        return $request;
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
    public function edit(Laundry $laundry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Laundry  $laundry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Laundry $laundry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Laundry  $laundry
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laundry $laundry)
    {
        //
    }
}
