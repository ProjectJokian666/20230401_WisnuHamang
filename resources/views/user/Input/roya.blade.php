@extends('layouts.user')
@section('main-content-user')
<div class="container col-lg-12">
    <a href="/menu" class="btn btn-info mb-4">Kembali</a>
</div>
<div class="container col-lg-6">
    <div class="card shadow">
        <h3 class="card-header bg-primary text-light text-center">Silakan Masukan Data</h3>
        <div class="card-body">
            <form action="/users/royas/add/" enctype="multipart/form-data" method="post">
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
                    <label for="">Fotocopy KTP</label>
                    <input type="file" class="form-control @error('fcKtp') is-invalid @enderror" name="fcKtp" required>
                </div>
                @error('fcKtp')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-2">
                    <label for="">Fotocopy KK</label>
                    <input type="file" class="form-control @error('fcKk') is-invalid @enderror" name="fcKk" required>
                </div>
                @error('fcKk')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-2">
                    <label for="">Surat Permohonan Dari Bank</label>
                    <input type="file" class="form-control @error('suratPermohonan') is-invalid @enderror" name="suratPermohonan" required>
                </div>
                @error('suratPermohonan')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-2">
                    <label for="">Surat Lunas Dari Bank</label>
                    <input type="file" class="form-control @error('suratLunas') is-invalid @enderror" name="suratLunas" required>
                </div>
                @error('suratLunas')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-2">
                    <label for="">KTP Petugas Bank</label>
                    <input type="file" class="form-control @error('ktpPetugas') is-invalid @enderror" name="ktpPetugas" required>
                </div>
                @error('ktpPetugas')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-2">
                    <label for="">Sertifikat Asli</label>
                    <input type="file" class="form-control @error('sertifikatAsli') is-invalid @enderror" name="sertifikatAsli" required>
                </div>
                @error('sertifikatAsli')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
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
                        @foreach ($data['royas'] as $data)
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
                                @if($data->status == 1)
                                @if($data->pembayaran == 'belum' && $data->ket == 'bayar')
                                <a href="{{url('/royas/cvs/bayar/'.$data->id)}}" class="btn btn-sm btn-success">PEMBAYARAN</a>
                                @elseif($data->pembayaran == 'konfirm' && $data->ket == 'dp')
                                <a href="{{url('/royas/cvs/bayar/'.$data->id)}}" class="btn btn-sm btn-success">PEMBAYARAN</a>
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