@extends('layouts.admin')
@section('main-content')
<div class="container">
    <div class="card shadow">
        <h3 class="card-header">Detail Roya</h3>
        <div class="card-body">
            <table class="table table-hover">
              <a href="/royas" class="btn btn-primary mb-4">Kembali</a>
                <thead align="left">
                    <tr>
                        <th class="text-center" scope="col">NAMA DOCUMENT</th>
                        <th class="text-center" scope="col">NAMA FILE</th>
                        <th class="text-center" scope="col">ACTION</th>
                    </tr>
                </thead>
                <tbody align="center">
                  <tr>
                    <td>Fotocopy KTP</td>
                    <td>{{$data->fcKtp}}</td>
                    <td><a href="{{asset('Roya/KTP/'.$data->fcKtp)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                  <tr>
                    <td>Fotocopy KK</td>
                    <td>{{$data->fcKk}}</td>
                    <td><a href="{{asset('Roya/KK/'.$data->fcKk)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                  <tr>
                    <td>Surat Permohonan Dari Bank</td>
                    <td>{{$data->suratPermohonan}}</td>
                    <td><a href="{{asset('Roya/Surat_Permohonan/'.$data->suratPermohonan)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                  <tr>
                    <td>Surat Lunas Dari Bank</td>
                    <td>{{$data->suratLunas}}</td>
                    <td><a href="{{asset('Roya/Surat_Lunas/'.$data->suratLunas)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                  <tr>
                    <td>KTP Petugas Bank</td>
                    <td>{{$data->ktpPetugas}}</td>
                    <td><a href="{{asset('Roya/KTP_Petugas/'.$data->ktpPetugas)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                  <tr>
                    <td>Sertifikat Asli</td>
                    <td>{{$data->sertifikatAsli}}</td>
                    <td><a href="{{asset('Roya/Sertifikat_Asli/'.$data->sertifikatAsli)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                </tbody>
            </table>
        </div>
      </div>
</div>
@endsection