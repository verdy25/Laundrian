@extends('layout.main')

@section('title', 'Tambah paket laundry')

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
                <form method="POST" action="/laundriin" id="laundrian">
                    @csrf
                    <div class="form-group">
                        <label for="member_id">Id member</label>
                        <input type="text" class="form-control @error('member_id') is-invalid @enderror" id="member_id"
                            name="member_id" value="{{old('member_id')}}">
                        @error('member_id')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="package_id">Laundry</label>
                        <select name="package_id" id="package_id"
                            class="form-control @error('package_id') is-invalid @enderror">
                            <option selected value="{{old('package_id')}}">{{old('package_id')}}</option>
                            @foreach ($packages as $package)
                            <form>
                                <option id="paket"
                                    value="{'package_id' : '{{$package->id}}' , 'harga' : '{{$package->harga}}' ">
                                    {{$package->nama_paket}} ({{$package->durasi}} hari - {{$package->types->type}})
                                </option>
                            </form>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pcs">Pcs / Kilo</label>
                        <input type="number" class="form-control @error('pcs') is-invalid @enderror" id="pcs" name="pcs"
                            value="{{old('pcs')}}">
                        @error('pcs')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="cost">Harga</label>
                        <input type="text" class="form-control @error('cost') is-invalid @enderror" id="cost"
                            name="cost" disabled>
                        @error('cost')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="payment_status_id">Pembayaran</label>
                        <select name="payment_status_id" id="payment_status_id"
                            class="form-control @error('payment_status_id') is-invalid @enderror">
                            <option selected value="{{old('payment_status_id')}}">{{old('payment_status_id')}}</option>
                            @foreach ($payment_status as $status)
                            <option value="{{$status->id}}">{{$status->status}}</option>
                            @endforeach
                        </select>
                        @error('payment_status_id')
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
    <footer class="bg-white sticky-footer">
        <div class="container my-auto">
            <div class="text-center my-auto copyright"><span>Copyright © Brand 2019</span></div>
        </div>
    </footer>
</div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
@endsection