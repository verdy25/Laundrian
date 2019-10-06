@extends('layout.main')

@section('title', 'Paket Laundry')

@section('container')
<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        
        <div class="container-fluid mt-3">
            <h3 class="text-dark mb-4">Paket X'Laundry</h3>
            <a href="{{url('laundry/create')}}" class="btn btn-primary mb-3">Tambah data paket laundry</a>
            @if (session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
            @endif
            <div class="card shadow">
                <div class="card-header py-3">
                    <p class="text-primary m-0 font-weight-bold">Paket laundry</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        {{-- <div class="col-md-6 text-nowrap">
                            <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable">
                                <label>Show&nbsp;<select
                                        class="form-control form-control-sm custom-select custom-select-sm">
                                        <option value="10" selected="">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>&nbsp;</label></div>
                        </div>
                        <div class="col-md-6">
                            <div class="text-md-right dataTables_filter" id="dataTable_filter"><label><input
                                        type="search" class="form-control form-control-sm" aria-controls="dataTable"
                                        placeholder="Search"></label></div>
                        </div> --}}
                    </div>
                    <div class="table-responsive table mt-2" id="dataTable" role="grid"
                        aria-describedby="dataTable_info">
                        <table class="table dataTable my-0" id="dataTable">
                            <thead>
                                <tr>
                                    <th>Nama Paket</th>
                                    <th>Jenis Paket</th>
                                    <th>Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($packages as $package)
                                <tr>
                                    <td>{{$package->nama_paket}}</td>
                                    <td>{{$package->types->type}}</td>
                                    <td>{{$package->harga}}</td>
                                    <td>
                                        <a href="/laundry/{{$package->id}}/edit" class="btn btn-primary">Edit</a>
                                        <form class="d-inline" method="POST" action="/laundry/{{$package->id}}">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger" type="submit">hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-6 align-self-center">
                            {{-- <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Showing 1 to
                                10 of 27</p> --}}
                        </div>
                        <div class="col-md-6">
                            <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                <ul class="pagination">
                                        {{ $packages->links()}}
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
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