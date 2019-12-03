@extends('layouts.master')
@section('content')
<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        <div class="container-fluid mt-3">
            <h3 class="text-dark mb-4">Nge-Laundry</h3>
            <a href="{{route('laundriin.create')}}" class="btn btn-primary mb-3">Tambah laundry</a>
            @if (session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
            @endif
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tabel Laundrian</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table dataTable my-0" id="dataTable">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Member</th>
                                    <th>Tagihan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($laundries as $laundry)
                                <tr>
                                    <td>{{$laundry->created_at->format('d F Y')}}</td>
                                    <td>{{$laundry->members->nama}}</td>
                                    <td>{{$laundry->cost}}</td>
                                    <td>
                                        <a href="{{route('laundriin.edit', $laundry->id)}}" class="btn btn-primary">Edit</a>
                                        <form class="d-inline" method="POST" action="{{route('laundriin.destroy', $laundry->id)}}">
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