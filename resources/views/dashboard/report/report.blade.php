@extends('layouts.admin2')

@section('css')
<script src="{{asset('js/highcharts.js')}}"></script>
@include('csss')
@endsection

@section('main-content')


<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center justify-items-center h3">
            <a href="{{route('home')}}">{{ __('Dashboard') }}</a> / 
            <a href="{{url('report')}}">{{ __('Report Berkas') }}</a>
        </div>
    </div>
</div>

<!-- Begin Page Content -->
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow">
            <div class="card-body">
                <h3 class=" font-weight-bold text-primary text-center">CETAK DATA REPORT</h3>
                <div class="row">
                    <div class="col-lg-4">
                        <select id="berkas" class="form-control">
                            <option value="" >Pilih Filter Berkas...</option>
                            <option value="aphbs" >APHB</option>
                            <option value="cvs" >CV</option>
                            <option value="hibahs" >HIBAH</option>
                            <option value="jual_belis" >JUAL BELI</option>
                            <option value="nibs" >NIB</option>
                            <option value="pecah_sertifikats" >PECAH SERTIFIKAT</option>
                            <option value="penyertifikatans" >PENYERTIFIKATAN</option>
                            <option value="peta_bidangs" >PETA BIDANG</option>
                            <option value="pts" >PT</option>
                            <option value="royas" >ROYA</option>
                            <option value="siups" >SIUP</option>
                            <option value="waris" >WARIS</option>
                        </select>
                    </div>
                    <div class="col-lg-4" id="bkondisi">
                        <select id="kondisi" class="form-control">
                            <option value="" >Pilih Filter ...</option>
                            <option value="menunggu_verif" >Menunggu Verifikasi</option>
                            <option value="sudah_verif" >Sudah Ter Verifikasi</option>
                            <option value="menunggu_konfirm" >Menunggu Konfirmasi</option>
                            <option value="sudah_konfirm" >Sudah Ter Konfirmasi</option>
                        </select>
                    </div>
                    <div class="col-lg-4" id="bcetak">
                        <button id="cetak" onclick="cetak_data()" class="form-control btn btn-info">CETAK DATA</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="col-lg-12">
        <div class="card shadow ">
            <div class="card-body">
                <h3 class=" font-weight-bold text-primary text-center">DATA REPORT</h3>
                <div class="table-responsive">
                    <table class="table table-hover" id="dataTable">
                        <thead>
                            <tr>
                                <th class="text-center" scope="col">NIK</th>
                                <th class="text-center" scope="col">JENIS SURAT</th>
                                <th class="text-center" scope="col">TANGGAL PENGAJUAN</th>
                                <th class="text-center" scope="col">VERIFIKASI</th>
                                <th class="text-center" scope="col">PEMBAYARAN</th>
                            </tr>
                        </thead>
                        <tbody align="center">
                            @foreach(array_keys($data) as $x)
                            @foreach($data[$x] as $d)
                            <tr>
                                <td>{{$d->nik}}</td>
                                <td>{{$x}}</td>
                                <td>{{$d->tanggal}}</td>
                                <td>
                                    @if($d->status=='2')
                                    <button class="btn btn-sm btn-warning">MENUNGGU VERIFIKASI</button>
                                    @elseif($d->status=='1')
                                    <button class="btn btn-sm btn-info">SUDAH TERVERIFIKASI</button>
                                    @endif
                                </td>
                                <td>
                                    @if($d->pembayaran=='sudah' && $d->ket=='lunas')
                                    <button class="btn btn-sm btn-info">PEMBAYARAN LUNAS</button>
                                    @elseif($d->pembayaran=='sudah' && $d->ket=='dp')
                                    <button class="btn btn-sm btn-secondary">VERIFIKASI PEMBAYARAN DP</button>
                                    @elseif($d->pembayaran=='konfirm' && $d->ket=='dp')
                                    <button class="btn btn-sm btn-secondary">PEMBAYARAN DP</button>
                                    @elseif($d->pembayaran=='belum' && $d->ket=='bayar')
                                    <button class="btn btn-sm btn-warning">MENUNGGU UPLOAD BUKTI PEMBAYARAN</button>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <figure class="highcharts-figure col-lg-12 row">
        <div id="grapik" class="col-lg-12">
        </div>
    </figure>
</div>
@endsection
@section('js')

<script src="{{asset('admin/assets/extra-libs/DataTables/datatables.min.js')}}"></script>
<script>
 $('#dataTable').DataTable();
    $(document).ready(function(){
        $('#bkondisi').hide();
        $('#bcetak').hide();
        $('#berkas').on('change',function(){
            if ($('#berkas').val()=="") {
                $('#bkondisi').hide();
                $('#bcetak').hide();
            }
            else{
                $('#bkondisi').show();
                $('#bcetak').hide();
                $('#kondisi').on('change',function(){
                    if($('#kondisi').val()==""){
                        $('#bcetak').hide();
                    }
                    else{
                        $('#bcetak').show();
                    }
                });
            }
        });
    });
    function cetak_data(){
        berkas = $('#berkas').val();
        kondisi = $('#kondisi').val();
        window.open('{{route('cetak')}}?berkas='+berkas+'&kondisi='+kondisi,"_blank");
    }

    Highcharts.chart('grapik', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'DATA TRANSAKSI'
        },
        subtitle: {
            text: 'https://www.highcharts.com/demo/column-basic'
        },
        xAxis: {
            categories: {!!json_encode($grafikindex)!!},
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'JUMLAH'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><br><table>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Sudah Selesai',
            data: {!!json_encode($grafiksudah)!!}

        }, {
            name: 'Belum Selesai',
            data: {!!json_encode($grafikbelum)!!}

        },{
            name: 'Total',
            data: {!!json_encode($grafiktotal)!!}

        },]
    });

</script>
@endsection