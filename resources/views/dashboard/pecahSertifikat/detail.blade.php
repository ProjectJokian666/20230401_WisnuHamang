@extends('layouts.admin')
@section('main-content')
<div class="container">
    <div class="card shadow">
        <h3 class="card-header">Detail Pecah Sertifikat</h3>
        <div class="card-body">
            <table class="table table-hover">
              <a href="/pecahSertifikats" class="btn btn-primary mb-4">Kembali</a>
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
                    <td><a href="{{asset('Pecah_Sertifikat/KTP/'.$data->fcKtp)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                  <tr>
                    <td>Fotocopy KK</td>
                    <td>{{$data->fcKk}}</td>
                    <td><a href="{{asset('Pecah_Sertifikat/KK/'.$data->fcKk)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                  <tr>
                    <td>Sertifikat Asli</td>
                    <td>{{$data->sertifikatAsli}}</td>
                    <td><a href="{{asset('Pecah_Sertifikat/Sertifikat_Asli/'.$data->sertifikatAsli)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                  <tr>
                    <td>PBB Terbaru</td>
                    <td>{{$data->pbbTerbaru}}</td>
                    <td><a href="{{asset('Pecah_Sertifikat/PBB/'.$data->pbbTerbaru)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                  <tr>
                    <td>Foto Lokasi</td>
                    <td>{{$data->fotoLokasi}}</td>
                    <td><a href="{{asset('Pecah_Sertifikat/Lokasi/'.$data->fotoLokasi)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                </tbody>
            </table>
        </div>
      </div>
</div>
@endsection