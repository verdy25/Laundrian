@extends('layouts.master')
@section('content')
<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        <div class="container-fluid mt-3">
            <h3 class="text-dark mb-4">Pengeluaran Laundry</h3>
            <a href="{{route('management.create')}}" class="btn btn-primary mb-3">Tambah data Pengeluaran</a>
            @if (session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
            @endif
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tabel Pengeluaran</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table dataTable my-0" id="dataTable">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nama</th>
                                    <th>Jumlah</th>
                                    <th>Harga satuan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($managements as $management)
                                <tr>
                                    <td>K{{$management->id}}</td>
                                    <td>{{$management->nama}}</td>
                                    <td>{{$management->jumlah}}</td>
                                    <td>{{$management->nominal}}</td>
                                    <td>
                                        <a href="{{route('management.edit', $management->id)}}" class="btn btn-primary">Edit</a>
                                        <form class="d-inline" method="POST" action="{{route('management.destroy', $management->id)}}">
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection