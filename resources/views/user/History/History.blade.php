@extends('layouts.user')
@section('main-content-user')
<div class="container col-lg-12">
    <a href="/menu" class="btn btn-info mb-4">Kembali</a>
</div>
@endsection
@section('main-content-user2')
<div class="container col-lg-12">
    <div class="card shadow">
        <h3 class="card-header bg-primary text-light text-center">Data History</h3>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover" id="dataTable">
                    <thead>
                        <tr>
                            <th class="text-center" scope="col">JENIS SURAT</th>
                            <th class="text-center" scope="col">TANGGAL PENGAJUAN</th>
                            <th class="text-center" scope="col">VERIFIKASI</th>
                            <th class="text-center" scope="col">PEMBAYARAN</th>
                        </tr>
                    </thead>
                    <tbody align="center">
                        @foreach(array_keys($data) as $x)
                        @foreach($data[$x] as $d)
                        <tr>
                            <td>{{$x}}</td>
                            <td>{{$d->tanggal}}</td>
                            <td>
                                @if($d->status=='1')
                                <button class="btn btn-sm btn-warning">MENUNGGU VERIFIKASI</button>
                                @elseif($d->status=='2')
                                <button class="btn btn-sm btn-info">SUDAH TERVERIFIKASI</button>
                                @endif
                            </td>
                            <td>
                                @if($d->pembayaran=='konfirm')
                                <button class="btn btn-sm btn-info">SUDAH TERKONFIRMASI</button>
                                @elseif($d->pembayaran=='belum')
                                <button class="btn btn-sm btn-warning">MENUNGGU KONFIRMASI</button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection