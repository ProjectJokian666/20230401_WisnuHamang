@extends('layouts.user')
@section('main-content-user')
<div class="container">
    <div class="card shadow">
        <h3 class="card-header">PEMBAYARAN HIBAH</h3>
        <div class="card-body">
            <form action="{{url('users/hibahs/bayar/'.$id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mt-2 ml-5">
                    <label for=""><strong> Tanggal</strong> </label>
                    <input type="text" class="form-control col-lg-12" value="{{$data->tanggal}}" name="tanggal" readonly>
                </div>
                <div class="mt-2 ml-5">
                    <label for=""><strong> NIK</strong> </label>
                    <input type="text" class="form-control col-lg-12" value="{{$data->nik}}" name="nik" readonly>
                </div>
                <div class="mt-2 ml-5">
                    <label for=""><strong>UPLOAD BUKTI PEMBAYARAN</strong></label>
                    <input type="file" class="form-control @error('bukti') is-invalid @enderror" name="bukti" required>
                </div>
                @error('bukti')
                <div class="mt-2 ml-5 alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mt-2 ml-5">
                    <label for=""><strong>KET PEMBAYARAN</strong></label>
                    <select class="form-control @error('ket') is-invalid @enderror" name="ket">
                        <option value="bayar" <?= $data['ket'] == 'bayar' ? 'selected' : '' ?> >bayar</option>
                        <option value="dp" <?= $data['ket'] == 'dp' ? 'selected' : '' ?> >dp</option>
                        <option value="lunas" <?= $data['ket'] == 'lunas' ? 'selected' : '' ?> >pelunasan</option>
                    </select>
                </div>
                @error('ket')
                <div class="mt-2 ml-5 alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mt-5 mb-5 ml-5">
                    <button type="submit" class="btn btn-success col-2">Simpan</button>
                    <a href="{{url('users/hibahs')}}" class="btn btn-info col-2">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection