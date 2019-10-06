@extends('layout.main')

@section('title', 'Dashboard Laundry')

@section('container')
<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        <div class="container-fluid mt-3 mt-3">
            {{-- <div class="d-sm-flex justify-content-between align-items-center mb-4">
                <h3 class="text-dark mb-0">Dashboard</h3><a class="btn btn-primary btn-sm d-none d-sm-inline-block"
                    role="button" href="#"><i class="fas fa-download fa-sm text-white-50"></i>&nbsp;Generate Report</a>
            </div> --}}
            <div class="row">
                <div class="col-md-6 col-xl-3 mb-4">
                    <div class="card shadow border-left-primary py-2">
                        <div class="card-body">
                            <div class="row align-items-center no-gutters">
                                <div class="col mr-2">
                                    <div class="text-uppercase text-primary font-weight-bold text-xs mb-1">
                                        <span>penghasilan (hari ini)</span></div>
                                    <div class="text-dark font-weight-bold h5 mb-0"><span>Rp {{$pendapatan_harian}}</span></div>
                                </div>
                                <div class="col-auto"><i class="fas fa-dollar-sign fa-2x text-gray-300"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3 mb-4">
                    <div class="card shadow border-left-success py-2">
                        <div class="card-body">
                            <div class="row align-items-center no-gutters">
                                <div class="col mr-2">
                                    <div class="text-uppercase text-success font-weight-bold text-xs mb-1">
                                        <span>penghasilan (bulan ini)</span></div>
                                    <div class="text-dark font-weight-bold h5 mb-0"><span>Rp {{$pendapatan}}</span></div>
                                </div>
                                <div class="col-auto"><i class="fas fa-dollar-sign fa-2x text-gray-300"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3 mb-4">
                    <div class="card shadow border-left-info py-2">
                        <div class="card-body">
                            <div class="row align-items-center no-gutters">
                                <div class="col mr-2">
                                    <div class="text-uppercase text-info font-weight-bold text-xs mb-1">
                                        <span>Transaksi (Hari ini)</span></div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="text-dark font-weight-bold h5 mb-0 mr-3"><span>{{$transaksi_hr}}</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto"><i class="fas fa-receipt fa-2x text-gray-300"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3 mb-4">
                    <div class="card shadow border-left-warning py-2">
                        <div class="card-body">
                            <div class="row align-items-center no-gutters">
                                <div class="col mr-2">
                                    <div class="text-uppercase text-warning font-weight-bold text-xs mb-1">
                                        <span>Transaksi (Bulan ini)</span></div>
                                    <div class="text-dark font-weight-bold h5 mb-0"><span>{{$transaksi_bln}}</span></div>
                                </div>
                                <div class="col-auto"><i class="fas fa-receipt fa-2x text-gray-300"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 font-weight-bold">Transaksi</p>
                        </div>
                        <div class="card-body">
                            {{-- <div class="row">
                                <div class="col-md-6 text-nowrap">
                                    <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable">
                                        <label>Show&nbsp;<select
                                                class="form-control form-control-sm custom-select custom-select-sm"
                                                id="pagination">
                                                <option value="2" @if($items==2) selected @endif>10</option>
                                                <option value="5" @if($items==5) selected @endif>25</option>
                                                <option value="50" @if($items==50) selected @endif>50</option>
                                            </select>&nbsp;</label>
                                        </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-md-right dataTables_filter" id="dataTable_filter"><label><input
                                                type="search" class="form-control form-control-sm"
                                                aria-controls="dataTable" placeholder="Search"></label></div>
                                </div>
                            </div> --}}
                            <div class="table-responsive table mt-2" id="dataTable" role="grid"
                                aria-describedby="dataTable_info">
                                <table class="table dataTable my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Transaksi</th>
                                            <th>Pemasukan</th>
                                            <th>Pengeluaran</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transaksi as $item)
                                        <tr>
                                            <td>{{$item->created_at->format('d-m-Y')}}</td>
                                            <td>{{$item->transaksi}}</td>
                                            <td>Rp {{$item->pemasukan}}</td>
                                            <td>Rp {{$item->pengeluaran}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="2"></td>
                                            <td><strong>Rp {{$pemasukan}}</strong></td>
                                            <td><strong>Rp {{$pengeluaran}}</strong></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"></td>
                                            <td><strong>Pendapatan</strong></td>
                                            <td><strong>Rp {{$pendapatan}}</strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-6 align-self-center">
                                    {{-- <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">
                                        Showing 1 to 10 of 27</p> --}}
                                </div>
                                <div class="col-md-6">
                                    <nav
                                        class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                        <ul class="pagination">
                                            {{ $transaksi->links()}}
                                        </ul>
                                    </nav>
                                </div>
                            </div>
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
{{-- <script>
    document.getElementById('pagination').onchange = function() {
            window.location = "{{ $transaksi->url(1) }}&items=" + this.value;
        };
</script> --}}
@endsection