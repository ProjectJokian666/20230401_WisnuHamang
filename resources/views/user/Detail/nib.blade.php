@extends('layouts.user')
@section('main-content-user')
<div class="container">
    <div class="card shadow">
        <h3 class="card-header text-center bg-primary text-light">Analisis Data</h3>
        <div class="card-body">
            <table class="table table-hover" >
                <div class="row mb-5">
                    <div class="col-md-2">
                        <form action="/users/nibs/batal/{{$datax->id}}" method="post">
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
                        <form action="/users/nibs/selesai/{{$datax->id}}" method="post">
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
                    <td>Fotocopy KTP Pengurus 1</td>
                    <td>{{$datax->fcKtpPengurus1}}</td>
                    <td><a href="{{asset('NIB/KTP_Pengurus/'.$datax->fcKtpPengurus1)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                  <tr>
                    <td>Fotocopy KTP Pengurus 2</td>
                    <td>{{$datax->fcKtpPengurus2}}</td>
                    <td><a href="{{asset('NIB/KTP_Pengurus/'.$datax->fcKtpPengurus2)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                  <tr>
                    <td>Fotocopy KK Pengurus 1</td>
                    <td>{{$datax->fcKKPengurus1}}</td>
                    <td><a href="{{asset('NIB/KK_Pengurus/'.$datax->fcKKPengurus1)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                  <tr>
                    <td>Fotocopy KK Pengurus 2</td>
                    <td>{{$datax->fcKKPengurus2}}</td>
                    <td><a href="{{asset('NIB/KK_Pengurus/'.$datax->fcKKPengurus2)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                  <tr>
                    <td>NPWP</td>
                    <td>{{$datax->npwp}}</td>
                    <td><a href="{{asset('NIB/NPWP/'.$datax->npwp)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                </tbody>
            </table>
        </div>
      </div>
</div>
@endsection