@extends('layouts.admin')
@section('main-content')
<div class="container">
    <div class="card shadow">
        <h3 class="card-header">Edit Status NIB</h3>
        <div class="card-body">
            <form action="/updateNIB/{{$data->id}}" method="POST">
            @method('patch')
            @csrf

            <div class="mt-2 ml-5">
                <label for=""><strong> Tanggal</strong> </label>
                <input type="text" class="form-control col-lg-8" value="{{$data->tanggal}}" name="tanggal" readonly>
            </div>
            <div class="mt-2 ml-5">
                <label for=""><strong> NIK</strong> </label>
                <input type="text" class="form-control col-lg-8" value="{{$data->nik}}" name="nik" readonly>
            </div>
            <div class="mt-2 ml-5">
                <label for=""><strong> STATUS</strong> </label>
                <select name="status" class="form-control col-lg-8" value="{{$data->status}}">
                    @if($data->status == 1)
                        <option value="1">Selesai</option>
                        <option value="2">Belum</option>
                    @elseif($data->status == 2)
                        <option value="2">Belum</option>
                        <option value="1">Selesai</option>
                    @else
                        <option value="0">Pilih</option>
                        <option value="1">Selesai</option>
                        <option value="2">Belum</option>
                    @endif
                </select>
            </div>
            <div class="mt-5 mb-5 ml-5">
            <button type="submit" class="btn btn-success col-2">Simpan</button>
            <a href="/nibs" class="btn btn-info col-2">Kembali</a>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection