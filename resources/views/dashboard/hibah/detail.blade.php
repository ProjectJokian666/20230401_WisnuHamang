@extends('layouts.admin')
@section('main-content')
<div class="container">
    <div class="card shadow">
        <h3 class="card-header">Detail Hibah</h3>
        <div class="card-body">
            <table class="table table-hover">
              <a href="/hibahs" class="btn btn-primary mb-4">Kembali</a>
                <thead align="left">
                    <tr>
                        <th class="text-center" scope="col">NAMA DOCUMENT</th>
                        <th class="text-center" scope="col">NAMA FILE</th>
                        <th class="text-center" scope="col">ACTION</th>
                    </tr>
                </thead>
                <tbody align="center">
                  <tr>
                    <td>Fotocopy KTP Penerima</td>
                    <td>{{$data->fcKtpPenerima}}</td>
                    <td><a href="{{asset('Hibah/KTP_Penerima/'.$data->fcKtpPenerima)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                  <tr>
                    <td>Fotocopy KTP Pemberi</td>
                    <td>{{$data->fcKtpPemberi}}</td>
                    <td><a href="{{asset('Hibah/KTP_Pemberi/'.$data->fcKtpPemberi)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                  <tr>
                    <td>Fotocopy KK Penerima</td>
                    <td>{{$data->fcKkPenerima}}</td>
                    <td><a href="{{asset('Hibah/KK_Penerima/'.$data->fcKkPenerima)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                  <tr>
                    <td>Fotocopy KK Pemberi</td>
                    <td>{{$data->fcKkPemberi}}</td>
                    <td><a href="{{asset('Hibah/KK_Pemberi/'.$data->fcKkPemberi)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                  <tr>
                    <td>Buku Nikah Pemberi</td>
                    @if($data->bukuNikahPemberi == "")
                    <td>-</td>                   
                    <td></td>
                    @else
                    <td>{{$data->bukuNikahPemberi}}</td>  
                      <td>
                        <a href="{{asset('Hibah/Buku_Nikah_Pemberi/'.$data->bukuNikahPemberi)}}" target="blank" class="btn btn-info d-block">Lihat</a>
                      </td>
                    @endif
                  </tr>
                  <tr>
                    <td>Sertifikat Asli</td>
                    <td>{{$data->sertifikatAsli}}</td>
                    <td><a href="{{asset('Hibah/Sertifikat_Asli/'.$data->sertifikatAsli)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                  <tr>
                    <td>PBB Terbaru</td>
                    <td>{{$data->pbbTerbaru}}</td>
                    <td><a href="{{asset('Hibah/PBB/'.$data->pbbTerbaru)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                  <tr>
                    <td>Foto Lokasi</td>
                    <td>{{$data->fotoLokasi}}</td>
                    <td><a href="{{asset('Hibah/Lokasi/'.$data->fotoLokasi)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                  <tr>
                    <td>Koordinat Lokasi</td>
                    <td>{{$data->koordinatLokasi}}</td>
                    <td><a href="{{asset('Hibah/Koordinat/'.$data->koordinatLokasi)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                </tbody>
            </table>
        </div>
      </div>
</div>
@endsection