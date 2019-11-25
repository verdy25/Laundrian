@extends('layouts.master')
@section('content')
<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        
        <div class="container-fluid mt-3">
            <div class="col-lg-10 col-xl-10 col-md-10">
                <h3 class="text-dark mb-4">Paket Laundry</h3>
                <form method="POST" action="/laundry/{{$package->id}}">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label for="nama_paket">ID</label>
                        <input type="text" class="form-control" value="{{$package->id}}" disabled>
                        @error('nama_paket')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama_paket">Nama</label>
                        <input type="text" class="form-control @error('nama_paket') is-invalid @enderror"
                            id="nama_paket" placeholder="Masukkan nama" name="nama_paket" value="{{$package->nama_paket}}">
                        @error('nama_paket')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="type_id">Jenis paket laundry</label>
                        <select name="type_id" id="type_id" class="form-control @error('type_id') is-invalid @enderror">
                            @foreach ($types as $type)
                            <option 
                                value="{{$type->id}}"
                                @if ($type->id === $package->type_id)
                                    selected                                    
                                @endif
                                >
                                {{$type->type}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text" class="form-control @error('harga') is-invalid @enderror" id="harga"
                            placeholder="Masukkan harga paket" name="harga" value="{{$package->harga}}">
                        @error('harga')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan data</button>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection