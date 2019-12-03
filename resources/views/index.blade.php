@extends('layouts.master')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 col-xl-3 my-4">
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
        <div class="col-md-6 col-xl-3 my-4">
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
        <div class="col-md-6 col-xl-3 my-4">
            <div class="card shadow border-left-info py-2">
                <div class="card-body">
                    <div class="row align-items-center no-gutters">
                        <div class="col mr-2">
                            <div class="text-uppercase text-info font-weight-bold text-xs mb-1">
                                <span>Transaksi (Hari ini)</span></div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="text-dark font-weight-bold h5 mb-0 mr-3"><span>{{$transaksi_hr}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto"><i class="fas fa-receipt fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3 my-4">
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

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel transaksi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form method="POST" action="{{route('export')}}" class="mb-3">
                    @csrf
                    <div class="row">
                        <div class="col-4">
                            <select name="bulan" id="bulan" class="form-control">
                                <option>Bulan</option>
                                @foreach ($bulans as $bulan)
                                <option value="{{$bulan[0]}}">{{$bulan[1]}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <select name="tahun" id="tahun" class="form-control">
                                <option>Tahun</option>
                                @foreach ($tahuns as $tahun)
                                <option value="{{$tahun}}">{{$tahun}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-2">
                            <button type="submit" class="btn btn-primary">cetak</button>
                        </div>
                    </div>
                </form>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                            <td>{{$item->created_at->format('d F Y')}}</td>
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
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection