@extends('layouts.admin')
@section('main-content')
<div class="container">
    <div class="card shadow">
        <h3 class="card-header">Detail Waris</h3>
        <div class="card-body">
            <table class="table table-hover">
              <a href="/wariss" class="btn btn-primary mb-4">Kembali</a>
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
                    <td>{{$datax->fcKtpAhliWaris}}</td>
                    <td><a href="{{asset('Waris/KTP_Ahli_Waris/'.$datax->fcKtpAhliWaris)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                  <tr>
                    <td>Fotocopy KK Ahli Waris</td>
                    <td>{{$datax->fcKkAhliWaris}}</td>
                    <td><a href="{{asset('Waris/KK_Ahli_Waris/'.$datax->fcKkAhliWaris)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                  <tr>
                    <td>Surat Pernyataan Waris</td>
                    <td>{{$datax->suratPernyataan}}</td>
                    <td><a href="{{asset('Waris/Surat_Pernyataan/'.$datax->suratPernyataan)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                  <tr>
                    <td>Surat Kematian</td>
                    <td>{{$datax->suratKematian}}</td>
                    <td><a href="{{asset('Waris/Surat_Kematian/'.$datax->suratKematian)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                  <tr>
                    <td>Sertifikat Asli</td>
                    <td>{{$datax->sertifikatAsli}}</td>
                    <td><a href="{{asset('Waris/Sertifikat_Asli/'.$datax->sertifikatAsli)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                  <tr>
                    <td>PBB Terbaru</td>
                    <td>{{$datax->pbbTerbaru}}</td>
                    <td><a href="{{asset('Waris/PBB/'.$datax->pbbTerbaru)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                  <tr>
                    <td>Foto Lokasi</td>
                    <td>{{$datax->fotoLokasi}}</td>
                    <td><a href="{{asset('Waris/Lokasi/'.$datax->fotoLokasi)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                  <tr>
                    <td>Koordinat Lokasi</td>
                    <td>{{$datax->koordinatLokasi}}</td>
                    <td><a href="{{asset('Waris/Koordinat/'.$datax->koordinatLokasi)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                </tbody>
            </table>
        </div>
      </div>
</div>
@endsection