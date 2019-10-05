@extends('layout.main')

@section('title', 'Edit Manajemens Laundry')

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
                <h3 class="text-dark mb-4">Manajemens X'Laundry</h3>
                <form method="POST" action="/management/{{$management->id}}">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                            placeholder="Masukkan nama" name="nama" value="{{$management->nama}}">
                        @error('nama')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="text" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah"
                            placeholder="Masukkan jumlah" name="jumlah" value="{{$management->jumlah}}">
                        @error('jumlah')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nominal">nominal</label>
                        <input type="text" class="form-control @error('nominal') is-invalid @enderror" id="nominal"
                            placeholder="Masukkan nominal" name="nominal" value="{{$management->nominal}}">
                        @error('nominal')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan data Pengeluaran</button>
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