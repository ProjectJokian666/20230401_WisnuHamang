@extends('layouts.admin')
@section('main-content')
<div class="container">
    <div class="card shadow">
        <h3 class="card-header">Detail APHB</h3>
        <div class="card-body">
            <table class="table table-hover">
              <a href="/aphbs" class="btn btn-primary mb-4">Kembali</a>
                <thead align="left">
                    <tr>
                        <th class="text-center" scope="col">NAMA DOCUMENT</th>
                        <th class="text-center" scope="col">NAMA FILE</th>
                        <th class="text-center" scope="col">ACTION</th>
                    </tr>
                </thead>
                <tbody align="center">
                  <tr>
                    <td>Fotocopy KTP Ahli Waris</td>
                    <td>{{$data->fcKtpAhliWaris}}</td>
                    <td><a href="{{asset('APHB/KTP_Ahli_Waris/'.$data->fcKtpAhliWaris)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                  <tr>
                    <td>Fotocopy KTP Penerima</td>
                    <td>{{$data->fcKtpPenerima}}</td>
                    <td><a href="{{asset('APHB/KTP_Penerima/'.$data->fcKtpPenerima)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                  <tr>
                    <td>Fotocopy KK Ahli Waris</td>
                    <td>{{$data->fcKkAhliWaris}}</td>
                    <td><a href="{{asset('APHB/KK_Ahli_Waris/'.$data->fcKkAhliWaris)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                  <tr>
                    <td>Fotocopy KK Penerima</td>
                    <td>{{$data->fcKkPenerima}}</td>
                    <td><a href="{{asset('APHB/KK_Penerima/'.$data->fcKkPenerima)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                  <tr>
                    <td>Sertifikat Asli</td>
                    <td>{{$data->sertifikatAsli}}</td>
                    <td><a href="{{asset('APHB/Sertifikat_Asli/'.$data->sertifikatAsli)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                  <tr>
                    <td>PBB Terbaru</td>
                    <td>{{$data->pbbTerbaru}}</td>
                    <td><a href="{{asset('APHB/PBB/'.$data->pbbTerbaru)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                  <tr>
                    <td>Foto Lokasi</td>
                    <td>{{$data->fotoLokasi}}</td>
                    <td><a href="{{asset('APHB/Lokasi/'.$data->fotoLokasi)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                  <tr>
                    <td>Koordinat Lokasi</td>
                    <td>{{$data->koordinatLokasi}}</td>
                    <td><a href="{{asset('APHB/Koordinat/'.$data->koordinatLokasi)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                </tbody>
            </table>
        </div>
      </div>
</div>
@endsection