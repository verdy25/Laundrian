@extends('layout.main')

@section('title', 'Nge-Laundry')

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
            <h3 class="text-dark mb-4">Nge-Laundry</h3>
            <a href="{{url('laundriin/create')}}" class="btn btn-primary mb-3">Tambah laundry</a>
            @if (session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
            @endif
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 text-nowrap">
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
                        </div>
                    </div>
                    <div class="table-responsive table mt-2" id="dataTable" role="grid"
                        aria-describedby="dataTable_info">
                        <table class="table dataTable my-0" id="dataTable">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Member</th>
                                    <th>Paket</th>
                                    <th>Tagihan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($laundries as $laundry)
                                <tr>
                                    <td>{{$laundry->create_at}}</td>
                                    <td>{{$laundry->member_id}}</td>
                                    <td>{{$laundry->package_id}}</td>
                                    <td>{{$laundry->cost}}</td>
                                    <td>{{$laundry->payment_status_id}}</td>
                                    <td>
                                        <a href="/laundriin/{{$laundry->id}}/edit" class="btn btn-primary">Edit</a>
                                        <form class="d-inline" method="POST" action="/laundriin/{{$laundry->id}}">
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
                            <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Showing 1 to
                                10 of 27</p>
                        </div>
                        <div class="col-md-6">
                            <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                <ul class="pagination">
                                    <li class="page-item disabled"><a class="page-link" href="#"
                                            aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span
                                                aria-hidden="true">»</span></a></li>
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