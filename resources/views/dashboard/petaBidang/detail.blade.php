@extends('layouts.admin')
@section('main-content')
<div class="container">
    <div class="card shadow">
        <h3 class="card-header">Detail Peta Bidang</h3>
        <div class="card-body">
            <table class="table table-hover">
              <a href="/petaBidangs" class="btn btn-primary mb-4">Kembali</a>
                <thead align="left">
                    <tr>
                        <th class="text-center" scope="col">NAMA DOCUMENT</th>
                        <th class="text-center" scope="col">NAMA FILE</th>
                        <th class="text-center" scope="col">ACTION</th>
                    </tr>
                </thead>
                <tbody align="center">
                  <tr>
                    <td>Fotocopy C Desa / Letter C / Petok D</td>
                    <td>{{$data->fcSurat}}</td>
                    <td><a href="{{asset('Peta_Bidang/Surat/'.$data->fcSurat)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                  <tr>
                    <td>Fotocopy KTP Pemohon</td>
                    <td>{{$data->fcKtpPemohon}}</td>
                    <td><a href="{{asset('Peta_Bidang/KTP_Pemohon/'.$data->fcKtpPemohon)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                  <tr>
                    <td>Fotocopy KK Pemohon</td>
                    <td>{{$data->fcKkPemohon}}</td>
                    <td><a href="{{asset('Peta_Bidang/KK_Pemohon/'.$data->fcKkPemohon)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                  <tr>
                    <td>PBB Terbaru</td>
                    <td>{{$data->pbbTerbaru}}</td>
                    <td><a href="{{asset('Peta_Bidang/PBB/'.$data->pbbTerbaru)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                  <tr>
                    <td>Foto Lokasi</td>
                    <td>{{$data->fotoLokasi}}</td>
                    <td><a href="{{asset('Peta_Bidang/Lokasi/'.$data->fotoLokasi)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                  <tr>
                    <td>Foto Patok</td>
                    <td>{{$data->fotoPatok}}</td>
                    <td><a href="{{asset('Peta_Bidang/Foto_Patok/'.$data->fotoPatok)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                </tbody>
            </table>
        </div>
      </div>
</div>
@endsection