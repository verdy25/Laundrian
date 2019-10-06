<?php

namespace App\Http\Controllers;

use App\Package;
use App\Type;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Package::paginate(10);
        $types = Type::all();
        return view('laundry.index', compact('types', 'packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $packages = Package::all();
        $types = Type::all();
        return view('laundry.create', compact('types', 'packages'));
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
            'nama_paket' => 'required',
            'type_id' => 'required',
            'harga' => 'required|numeric',
        ]);

        Package::create($request->all());
        return redirect('/laundry')->with('status', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Package  $Package
     * @return \Illuminate\Http\Response
     */
    public function show(Package $Package)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Package  $Package
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $types = Type::all();
        $package = Package::findOrFail($id);

        return view('laundry.edit', [
            'package' => $package,
            'types' => $types
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Package  $Package
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $package = Package::find($id);

        $request->validate([
            'nama_paket' => 'required',
            'type_id' => 'required',
            'harga' => 'required|numeric',
        ]);

        Package::where('id', $id)
            ->update([
                'nama_paket' => $request->nama_paket,
                'type_id' => $request->type_id,
                'harga' => $request->harga
            ]);

        return redirect('/laundry')->with('status', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Package  $Package
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Package::destroy($id);
        return redirect('/laundry')->with('status', 'Data telah dihapus');
    }
}
