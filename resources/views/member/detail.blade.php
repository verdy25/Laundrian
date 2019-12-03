@extends('layouts.master')
@section('content')
<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        <div class="container-fluid mt-3" id="app">
            <div class="col-lg-10 col-xl-10 col-md-10">
                <form method="GET" action="{{route('member.show', $member->id)}}">
                    <table class="table">
                        <tr>
                            <td><b>Member ID: </b></td>
                            <td>
                                <b>{{$member->id}}</b>
                            </td>
                        </tr>
                        <tr>
                            <td><b>Nama: </b></td>
                            <td>
                                <p>{{$member->nama}}</p>
                            </td>
                        </tr>
                        <tr>
                            <td><b>Nomor Handphone: </b></td>
                            <td>
                                <p>{{$member->hp}}</p>
                            </td>
                        </tr>
                        <a href="" v-on:click="cetak" target="_blank" class="btn btn-primary mb-3 no-print">Cetak
                            data</a>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection