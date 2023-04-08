@extends('layouts.admin')
@section('main-content')
<div class="container">
    <div class="card shadow">
        <h3 class="card-header">Detail CV</h3>
        <div class="card-body">
            <table class="table table-hover">
              <a href="/cvs" class="btn btn-primary mb-4">Kembali</a>
                <thead align="left">
                    <tr>
                        <th class="text-center" scope="col">NAMA DOCUMENT</th>
                        <th class="text-center" scope="col">NAMA FILE</th>
                        <th class="text-center" scope="col">ACTION</th>
                    </tr>
                </thead>
                <tbody align="center">
                  <tr>
                    <td>Fotocopy KTP Pengurus 1</td>
                    <td>{{$data->fcKtpPengurus1}}</td>
                    <td><a href="{{asset('CV/KTP_Pengurus/'.$data->fcKtpPengurus1)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                  <tr>
                    <td>Fotocopy KTP Pengurus 2</td>
                    <td>{{$data->fcKtpPengurus2}}</td>
                    <td><a href="{{asset('CV/KTP_Pengurus/'.$data->fcKtpPengurus2)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                  <tr>
                    <td>Fotocopy KK Pengurus 1</td>
                    <td>{{$data->fcKKPengurus1}}</td>
                    <td><a href="{{asset('CV/KK_Pengurus/'.$data->fcKKPengurus1)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                  <tr>
                    <td>Fotocopy KK Pengurus 2</td>
                    <td>{{$data->fcKKPengurus2}}</td>
                    <td><a href="{{asset('CV/KK_Pengurus/'.$data->fcKKPengurus2)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                  <tr>
                    <td>NPWP</td>
                    <td>{{$data->npwp}}</td>
                    <td><a href="{{asset('CV/NPWP/'.$data->npwp)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                </tbody>
            </table>
        </div>
      </div>
</div>
@endsection