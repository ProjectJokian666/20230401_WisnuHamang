@extends('layouts.admin')
@section('main-content')
<div class="container">
    <div class="card shadow">
        <h3 class="card-header">Detail Jual Beli</h3>
        <div class="card-body">
            <table class="table table-hover">
              <a href="/jualBelis" class="btn btn-primary mb-4">Kembali</a>
                <thead align="left">
                    <tr>
                        <th class="text-center" scope="col">NAMA DOCUMENT</th>
                        <th class="text-center" scope="col">NAMA FILE</th>
                        <th class="text-center" scope="col">ACTION</th>
                    </tr>
                </thead>
                <tbody align="center">
                  <tr>
                    <td>Fotocopy KTP Penjual</td>
                    <td>{{$data->fcKtpPenjual}}</td>
                    <td><a href="{{asset('Jual_Beli/KTP_Penjual/'.$data->fcKtpPenjual)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                  <tr>
                    <td>Fotocopy KTP Pembeli</td>
                    <td>{{$data->fcKtpPembeli}}</td>
                    <td><a href="{{asset('Jual_Beli/KTP_Pembeli/'.$data->fcKtpPembeli)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                  <tr>
                    <td>Fotocopy KK Penjual</td>
                    <td>{{$data->fcKkPenjual}}</td>
                    <td><a href="{{asset('Jual_Beli/KK_Penjual/'.$data->fcKkPenjual)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                  <tr>
                    <td>Fotocopy KK Pembeli</td>
                    <td>{{$data->fcKkPembeli}}</td>
                    <td><a href="{{asset('Jual_Beli/KK_Pembeli/'.$data->fcKkPembeli)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                  <tr>
                    <td>Buku Nikah Penjual</td>
                    @if($data->bukuNikahPenjual == "")
                    <td>-</td>                   
                    <td></td>
                    @else
                    <td>{{$data->bukuNikahPenjual}}</td>  
                      <td>
                        <a href="{{asset('Jual_Beli/Buku_Nikah_Penjual/'.$data->bukuNikahPenjual)}}" target="blank" class="btn btn-info d-block">Lihat</a>
                      </td>
                    @endif
                  </tr>
                  <tr>
                    <td>Fotocopy Sertifikat</td>
                    <td>{{$data->fcSertifikat}}</td>
                    <td><a href="{{asset('Jual_Beli/Sertifikat_FC/'.$data->fcSertifikat)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                  <tr>
                    <td>Sertifikat Asli</td>
                    <td>{{$data->sertifikatAsli}}</td>
                    <td><a href="{{asset('Jual_Beli/Sertifikat_Asli/'.$data->sertifikatAsli)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                  <tr>
                    <td>PBB Terbaru</td>
                    <td>{{$data->pbbTerbaru}}</td>
                    <td><a href="{{asset('Jual_Beli/PBB/'.$data->pbbTerbaru)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                  <tr>
                    <td>Foto Lokasi</td>
                    <td>{{$data->fotoLokasi}}</td>
                    <td><a href="{{asset('Jual_Beli/Lokasi/'.$data->fotoLokasi)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                  <tr>
                    <td>Koordinat Lokasi</td>
                    <td>{{$data->koordinatLokasi}}</td>
                    <td><a href="{{asset('Jual_Beli/Koordinat/'.$data->koordinatLokasi)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                </tbody>
            </table>
        </div>
      </div>
</div>
@endsection