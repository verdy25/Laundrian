@extends('layouts.master')
@section('content')
<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        <div class="container-fluid mt-3">
            <div class="col-lg-10 col-xl-10 col-md-10">
                <h3 class="text-dark mb-4">Members Laundry</h3>
                <form method="POST" action="/member/{{$member->id}}">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label>Id</label>
                        <input type="text" class="form-control col-sm-3" readonly value="{{$member->id}}">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                            placeholder="Masukkan nama" name="nama" value="{{$member->nama}}">
                        @error('nama')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="hp">Nomor Handphone</label>
                        <input type="text" class="form-control @error('hp') is-invalid @enderror" id="hp"
                            placeholder="Masukkan nomor handphone" name="hp" value="{{$member->hp}}">
                        @error('hp')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan data member</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection