@extends('layout.main')

@section('title', 'Tambah Members Laundry')

@section('container')
<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        
        <div class="container-fluid mt-3">
            <div class="col-lg-10 col-xl-10 col-md-10">
                <h3 class="text-dark mb-4">Members X'Laundry</h3>
                <form method="POST" action="/member">
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
                        <label for="hp">Nomor Handphone</label>
                        <input type="text" class="form-control @error('hp') is-invalid @enderror" id="hp"
                            placeholder="Masukkan nomor handphone" name="hp" value="{{old('hp')}}">
                        @error('hp')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah data member</button>
                </form>
            </div>
        </div>
    </div>
    <footer class="bg-white sticky-footer">
        <div class="container my-auto">
            <div class="text-center my-auto copyright"><span>Copyright © Brand 2019</span></div>
        </div>
    </footer>
</div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
@endsection