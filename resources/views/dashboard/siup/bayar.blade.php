@extends('layouts.admin')
@section('main-content')
<div class="container">
    <div class="card shadow">
        <h3 class="card-header">Konfirmasi Pembayaran</h3>
        <div class="card-body">
            <form action="/bayarSiup/{{$data->id}}" method="POST">
                @csrf
                <div class="mt-2 ml-5 row">
                    <img class="col-lg-12" src="{{asset('/SIUP/KK/'.$data->bukti)}}" alt="{{$data->bayar}}">
                </div>
                <div class="mt-5 mb-5 ml-5">
                    <button type="submit" class="btn btn-success col-2">Konfirmasi</button>
                    <a href="/siups" class="btn btn-info col-2">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection