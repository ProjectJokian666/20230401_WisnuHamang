@extends('layouts.user')
@section('main-content-user')
<div class="container">
    <div class="card shadow">
        <h3 class="card-header text-center bg-primary text-light">Analisis Data</h3>
        <div class="card-body">
            <table class="table table-hover" >
                <div class="row mb-5">
                    <div class="col-md-2">
                        <form action="/users/jualBelis/batal/{{$datax->id}}" method="post">
                            @method('delete')
                            @csrf
                            <a href="#" class="btn btn-sm btn-danger btn-block" data-toggle="modal" data-target="#batalModal">Batal</a>

                            <div class="modal fade" id="batalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">{{ __('Ready to Leave?') }}</h5>
                                          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">×</span>
                                          </button>
                                      </div>
                                      <div class="modal-body">Apakah Anda Yakin Ingin Membatalkan Transaksi ?</div>
                                      <div class="modal-footer">
                                          <button class="btn btn-info" type="button" data-dismiss="modal">{{ __('Cancel') }}</button>
                                          <button class="btn btn-danger" type="submit">Yakin</button>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          
                        </form>
                    </div>
                    <div class="col-md-8">
                    </div>
                    <div class="col-md-2">
                        <form action="/users/jualBelis/selesai/{{$datax->id}}" method="post">
                            @csrf
                            <a href="#" class="btn btn-sm btn-success btn-block" data-toggle="modal" data-target="#selesaiModal">Selesai</a>

                            <div class="modal fade" id="selesaiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">{{ __('Ready to Leave?') }}</h5>
                                          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">×</span>
                                          </button>
                                      </div>
                                      <div class="modal-body">Apakah Anda Yakin Data Sudah Sesuai ?</div>
                                      <div class="modal-footer">
                                          <button class="btn btn-info" type="button" data-dismiss="modal">{{ __('Cancel') }}</button>
                                          <button class="btn btn-success" type="submit">Yakin</button>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          
                        </form>
                    </div>
                </div>
              
                <thead align="left" class="bg-dark text-light">
                    <tr>
                        <th class="text-center" scope="col">NAMA DOCUMENT</th>
                        <th class="text-center" scope="col">NAMA FILE</th>
                        <th class="text-center" scope="col">ACTION</th>
                    </tr>
                </thead>
                <tbody align="center">
                    <tr>
                        <td>Fotocopy KTP Penjual</td>
                        <td>{{$datax->fcKtpPenjual}}</td>
                        <td><a href="{{asset('Jual_Beli/KTP_Penjual/'.$datax->fcKtpPenjual)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                    </tr>
                  <tr>
                    <td>Fotocopy KTP Penjual</td>
                    <td>{{$datax->fcKtpPenjual}}</td>
                    <td><a href="{{asset('Jual_Beli/KTP_Penjual/'.$datax->fcKtpPenjual)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                  <tr>
                    <td>Fotocopy KTP Pembeli</td>
                    <td>{{$datax->fcKtpPembeli}}</td>
                    <td><a href="{{asset('Jual_Beli/KTP_Pembeli/'.$datax->fcKtpPembeli)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                  <tr>
                    <td>Fotocopy KK Penjual</td>
                    <td>{{$datax->fcKkPenjual}}</td>
                    <td><a href="{{asset('Jual_Beli/KK_Penjual/'.$datax->fcKkPenjual)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                  <tr>
                    <td>Fotocopy KK Pembeli</td>
                    <td>{{$datax->fcKkPembeli}}</td>
                    <td><a href="{{asset('Jual_Beli/KK_Pembeli/'.$datax->fcKkPembeli)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                  <tr>
                    <td>Buku Nikah Penjual</td>
                    @if($datax->bukuNikahPenjual == "")
                    <td>-</td>                   
                    <td></td>
                    @else
                    <td>{{$datax->bukuNikahPenjual}}</td>  
                      <td>
                        <a href="{{asset('Jual_Beli/Buku_Nikah_Penjual/'.$datax->fcKtpPembeli)}}" target="blank" class="btn btn-info d-block">Lihat</a>
                      </td>
                    @endif
                  </tr>
                  <tr>
                    <td>Fotocopy Sertifikat</td>
                    <td>{{$datax->fcSertifikat}}</td>
                    <td><a href="{{asset('Jual_Beli/Sertifikat_FC/'.$datax->fcSertifikat)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                  <tr>
                    <td>Sertifikat Asli</td>
                    <td>{{$datax->sertifikatAsli}}</td>
                    <td><a href="{{asset('Jual_Beli/Sertifikat_Asli/'.$datax->sertifikatAsli)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                  <tr>
                    <td>PBB Terbaru</td>
                    <td>{{$datax->pbbTerbaru}}</td>
                    <td><a href="{{asset('Jual_Beli/PBB/'.$datax->pbbTerbaru)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                  <tr>
                    <td>Foto Lokasi</td>
                    <td>{{$datax->fotoLokasi}}</td>
                    <td><a href="{{asset('Jual_Beli/Lokasi/'.$datax->fotoLokasi)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                  <tr>
                    <td>Koordinat Lokasi</td>
                    <td>{{$datax->koordinatLokasi}}</td>
                    <td><a href="{{asset('Jual_Beli/Koordinat/'.$datax->koordinatLokasi)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                </tbody>
            </table>
        </div>
      </div>
</div>
@endsection