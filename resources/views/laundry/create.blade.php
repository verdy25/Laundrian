@extends('layouts.master')
@section('content')
<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        <div class="container-fluid mt-3">
            <div class="col-lg-10 col-xl-10 col-md-10">
                <h3 class="text-dark mb-4">Paket Laundry</h3>
                <form method="POST" action="{{route('laundry.store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="nama_paket">Nama Paket</label>
                        <input type="text" class="form-control @error('nama_paket') is-invalid @enderror"
                            id="nama_paket" placeholder="Masukkan nama paket laundry" name="nama_paket"
                            value="{{old('nama_paket')}}">
                        @error('nama_paket')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="type_id">Jenis paket laundry</label>
                        <select name="type_id" id="type_id" class="form-control @error('type_id') is-invalid @enderror">
                            <option selected value="{{old('type_id')}}">{{old('type_id')}}</option>
                            @foreach ($types as $type)
                            <option value="{{$type->id}}">{{$type->type}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga"
                            placeholder="Masukkan harga paket" name="harga" value="{{old('harga')}}">
                        @error('harga')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah data</button>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection