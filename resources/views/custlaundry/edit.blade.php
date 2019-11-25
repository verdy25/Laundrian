@extends('layouts.master')
@section('content')
<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">

        <div class="container-fluid mt-3" id="app">
            <div class="col-lg-10 col-xl-10 col-md-10">
                <h3 class="text-dark mb-4">Paket Laundry</h3>
                <form method="POST" action="/laundriin/{{$laundry->id}}">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label for="member_id">Id member</label>
                        <input type="text" class="form-control @error('member_id') is-invalid @enderror" id="member_id"
                            name="member_id" value="{{$laundry->member_id}}" readonly>
                        @error('member_id')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="package_price">Laundry</label>
                        <select name="package_price" id="package_price" v-model="harga"
                            class="form-control @error('package_price') is-invalid @enderror">
                            <option selected value="{{old('package_price')}}">{{old('package_price')}}</option>
                            @foreach ($packages as $package)
                            <option id="package_price" value="{{$package->harga}}">
                                {{$package->nama_paket}} ({{$package->types->type}})
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pcs">Pcs / Kilo</label>
                        <input type="number" class="form-control @error('pcs') is-invalid @enderror" id="pcs" name="pcs"
                            value="{{$laundry->pcs}}">
                        @error('pcs')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="cost">Harga</label>
                        <input type="text" class="form-control @error('cost') is-invalid @enderror" id="cost"
                            name="cost" v-model="count" aria-disabled="true">
                        @error('cost')
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
</div>
@endsection