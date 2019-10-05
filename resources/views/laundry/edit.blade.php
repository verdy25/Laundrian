@extends('layout.main')

@section('title', 'Edit Members Laundry')

@section('container')
<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
            <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3"
                    id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                <form class="form-inline d-none d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group"><input class="bg-light form-control border-0 small" type="text"
                            placeholder="Search for ...">
                        <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i
                                    class="fas fa-search"></i></button></div>
                    </div>
                </form>
                <ul class="nav navbar-nav flex-nowrap ml-auto">
                    <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link"
                            data-toggle="dropdown" aria-expanded="false" href="#"><i class="fas fa-search"></i></a>
                        <div class="dropdown-menu dropdown-menu-right p-3 animated--grow-in" role="menu"
                            aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto navbar-search w-100">
                                <div class="input-group"><input class="bg-light form-control border-0 small" type="text"
                                        placeholder="Search for ...">
                                    <div class="input-group-append"><button class="btn btn-primary py-0"
                                            type="button"><i class="fas fa-search"></i></button></div>
                                </div>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="col-lg-10 col-xl-10 col-md-10">
                <h3 class="text-dark mb-4">Paket Laundry</h3>
                <form method="POST" action="/member/{{$package->id}}">
                    @method('put')

                    @csrf
                    <div class="form-group">
                        <label for="nama_paket">Nama</label>
                        <input type="text" class="form-control @error('nama_paket') is-invalid @enderror"
                            id="nama_paket" placeholder="Masukkan nama" name="nama" value="{{$package->nama_paket}}">
                        @error('nama')
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
                    <div class="form-group">
                        <label for="durasi">Durasi</label>
                        <input type="text" class="form-control @error('durasi') is-invalid @enderror" id="durasi"
                            placeholder="Masukkan durasi pengerjaan" name="durasi" value="{{$package->durasi}}">
                        @error('durasi')
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
    <footer class="bg-white sticky-footer">
        <div class="container my-auto">
            <div class="text-center my-auto copyright"><span>Copyright © Brand 2019</span></div>
        </div>
    </footer>
</div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
@endsection