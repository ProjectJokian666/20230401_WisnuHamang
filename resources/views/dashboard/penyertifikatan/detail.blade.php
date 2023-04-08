@extends('layouts.admin')
@section('main-content')
<div class="container">
    <div class="card shadow">
        <h3 class="card-header">Detail Penyertifikatan</h3>
        <div class="card-body">
            <table class="table table-hover">
              <a href="/penyertifikatans" class="btn btn-primary mb-4">Kembali</a>
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
                        <td><a href="{{asset('Penyertifikatan/Surat/'.$data->fcSurat)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                      </tr>
                    <tr>
                    <tr>
                    <td>Fotocopy KTP Pemohon</td>
                    <td>{{$data->fcKtpPemohon}}</td>
                    <td><a href="{{asset('Penyertifikatan/KTP_Pemohon/'.$data->fcKtpPemohon)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                  <tr>
                    <td>Fotocopy KK Pemohon</td>
                    <td>{{$data->fcKkPemohon}}</td>
                    <td><a href="{{asset('Penyertifikatan/KK_Pemohon/'.$data->fcKkPemohon)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                  <tr>
                    <td>Kematian</td>
                    <td>{{$data->kematian}}</td>
                    <td><a href="{{asset('Penyertifikatan/Kematian/'.$data->kematian)}}" target="blank" class="btn btn-info d-block">Lihat</a></td>
                  </tr>
                </tbody>
            </table>
        </div>
      </div>
</div>
@endsection