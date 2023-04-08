@extends('layouts.user')
@section('main-content-user')
<div class="container col-lg-12">
    <a href="/menu" class="btn btn-info mb-4">Kembali</a>
</div>
<div class="container col-lg-6">
    <div class="card shadow">
        <h3 class="card-header bg-primary text-light text-center">Silakan Masukan Data</h3>
        <div class="card-body">
            <form action="/users/cvs/add/" enctype="multipart/form-data" method="post">
                @csrf
                <div class=" row mb-4">
                    <div class="col-md-4">
                        <label for="">ID Transaksi</label>
                        <input type="text" class="form-control" name="idTrx" value="{{auth()->user()->id . mt_rand(1,999)}}" readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="">Tanggal</label>
                        <input type="text" class="form-control" name="tanggal" value="{{date('d/m/Y')}}" readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="">NIK</label>
                        <input type="text" class="form-control" name="nik" value="{{auth()->user()->nik}}" readonly>
                    </div>
                </div>
                <div class="mb-2">
                    <label for="">Fotocopy KTP Pengurus 1</label>
                    <input type="file" class="form-control @error('fcKtpPengurus1') is-invalid @enderror" name="fcKtpPengurus1" required>
                    @error('fcKtpPengurus1')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="">Fotocopy KTP Pengurus 2</label>
                    <input type="file" class="form-control @error('fcKtpPengurus2') is-invalid @enderror" name="fcKtpPengurus2" required>
                    @error('fcKtpPengurus2')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="">Fotocopy KK Pengurus 1</label>
                    <input type="file" class="form-control @error('fcKkPengurus1') is-invalid @enderror" name="fcKkPengurus1" required>
                    @error('fcKkPengurus1')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="">Fotocopy KK Pengurus 2</label>
                    <input type="file" class="form-control @error('fcKkPengurus2') is-invalid @enderror" name="fcKkPengurus2" required>
                    @error('fcKkPengurus2')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="">NPWP</label>
                    <input type="file" class="form-control @error('npwp') is-invalid @enderror" name="npwp" required>
                    @error('npwp')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-sm btn-success" style="width: 200px;"> Simpan </button>
                    <button type="reset" class="btn btn-sm btn-danger"> Reset </button>
                </div>
            </form>
        </div>   
        <div class="card-footer bg-primary "></div>
    </div>
</div>
@endsection
@section('main-content-user2')
<div class="container col-lg-6">
    <div class="card shadow">
        <h3 class="card-header bg-primary text-light text-center">Data Pengajuan</h3>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover" id="dataTable">
                    <thead>
                        <tr>
                            <th class="text-center" scope="col">NO</th>
                            <th class="text-center" scope="col">TANGGAL PENGAJUAN</th>
                            <th class="text-center" scope="col">ESTIMASI WAKTU</th>
                            <th class="text-center" scope="col">PEMBAYARAN</th>
                        </tr>
                    </thead>
                    <tbody align="left">
                        @foreach ($data['cvs'] as $data)
                        <tr>
                            <th class="text-center" scope="row">{{$loop->iteration}}</th>
                            <td class="text-center">{{$data->tanggal}}</td>
                            <td class="text-center">
                                @if($data->status == 1)
                                <span class="badge badge-primary p-2">Selesai Verifikasi</span>
                                @elseif($data->status == 2)
                                <?php
                                $a = $data->tanggal;
                                $a = explode('/', $a);
                                $b = $a[1].'/'.$a[0].'/'.$a[2];
                                $b = strtotime($b);
                                ?>
                                {{DATE("d/m/Y",$b+60*60*24*7)}}
                                @endif
                            </td>
                            <td class="text-center">
                                <!-- {{$data->ket}}{{$data->pembayaran}} -->
                                @if($data->status == 1)
                                @if($data->pembayaran =='belum' && $data->ket=='bayar')
                                <a href="{{url('/users/cvs/bayar/'.$data->id)}}" class="btn btn-sm btn-success">PEMBAYARAN</a>
                                @elseif($data->pembayaran == 'konfirm' && $data->ket == 'dp')
                                <a href="{{url('/users/cvs/bayar/'.$data->id)}}" class="btn btn-sm btn-success">PEMBAYARAN</a>
                                @elseif($data->pembayaran == 'sudah' && $data->ket == 'dp')
                                <span class="badge badge-info p-2">Menunggu Verifikasi Berkas</span>
                                @elseif($data->pembayaran == 'sudah' && $data->ket == 'lunas')
                                <span class="badge badge-info p-2">Menunggu Verifikasi Berkas</span>
                                @elseif($data->pembayaran == 'konfirm'&& $data->ket == 'lunas')
                                <span class="badge badge-primary p-2">Selesai ter Konfirmasi</span>
                                @endif
                                @elseif($data->status == 2)
                                <span class="badge badge-primary p-2">Menunggu Verifikasi</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection