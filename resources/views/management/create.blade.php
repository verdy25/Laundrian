@extends('layouts.master')
@section('content')
<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        <div class="container-fluid mt-3">
            <div class="col-lg-10 col-xl-10 col-md-10">
                <h3 class="text-dark mb-4">Manajemens Laundry</h3>
                <form method="POST" action="/management">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                            placeholder="Masukkan nama" name="nama" value="{{old('nama')}}">
                        @error('nama')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="text" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah"
                            placeholder="Masukkan jumlah satuan" name="jumlah" value="{{old('jumlah')}}">
                        @error('jumlah')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nominal">Harga satuan</label>
                        <input type="numeric" class="form-control @error('nominal') is-invalid @enderror" id="nominal"
                            placeholder="Masukkan nominal" name="nominal" value="{{old('nominal')}}">
                        @error('nominal')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah data pengeluaran</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection