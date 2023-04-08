@extends('layouts.admin2')

@section('css')
<script src="{{asset('js/highcharts.js')}}"></script>
@endsection

@section('main-content')

<!-- Page Heading -->

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center justify-items-center h3">
            <a href="{{route('home')}}">{{ __('Dashboard') }}</a>
        </div>
    </div>
</div>

@if (session('success'))
<div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if (session('status'))
<div class="alert alert-success border-left-success" role="alert">
    {{ session('status') }}
</div>
@endif

<div class="row">
    <!-- Earnings (Monthly) Card Example -->
    @foreach(array_keys($widget['notif']) as $notif)
    <a href="{{url('/')}}/{{ $widget['notiflink'][$notif] }}" class="col-lg-2">
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-<?= $widget['notif'][$notif]>0 ? 'info' : '' ?>">
                <h6 class="m-0 font-weight-bold text-<?= $widget['notif'][$notif]>0 ? 'white' : 'primary' ?>">
                    {{ $notif }} <!-- <?= $loop->iteration; ?> -->
                </h6>
            </div>
            <div class="card-body bg-<?= $widget['notif'][$notif]>0 ? 'info' : '' ?>">
                <h7 class="m-0 font-weight-bold text-<?= $widget['notif'][$notif]>0 ? 'white' : 'primary' ?>">    
                    {{ $widget['notif'][$notif] }} Transaksi Baru
                </h7>
            </div>
        </div>
    </a>
    @endforeach
</div>

<div class="row">

    <div class="col-xl-4 col-md-4 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <div class="card-title text-xs font-weight-bold text-danger text-uppercase mb-1">BELUM SELESAI</div>
                        <div class="ml-auto text-right">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <div class="card-body row align-items-center">
                        <div class="col-auto">
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $widget['pedding']}}</div>
                        </div>
                        <div class="col">
                            <div class="progress progress-sm mr-2">
                                <div class="progress-bar bg-info" role="progressbar" style="width:{{$widget['barPedding']}}" aria-valuenow="{{$widget['pedding']}}" aria-valuemin="0" aria-valuemax="{{$widget['total']}}"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-4 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <div class="card-title text-xs font-weight-bold text-info text-uppercase mb-1">SUDAH SELESAI</div>
                        <div class="ml-auto text-right">
                            <i class="fas fa-clipboard-check fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <div class="card-body row align-items-center">
                        <div class="col-auto">
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $widget['selesai']}}</div>
                        </div>
                        <div class="col">
                            <div class="progress progress-sm mr-2">
                                <div class="progress-bar bg-info" role="progressbar" style="width:{{$widget['barSelesai']}}" aria-valuenow="{{$widget['selesai']}}" aria-valuemin="0" aria-valuemax="{{$widget['total']}}"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-4 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <div class="card-title text-xs font-weight-bold text-warning text-uppercase mb-1">{{ __('Users') }}</div>
                        <div class="ml-auto text-right">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <div class="card-body row align-items-center">
                        <div class="col-auto">
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $widget['users']}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">

    <!-- Content Column -->
    <div class="col-lg-6 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Transaksi Belum Selesai</h6>
            </div>
            <div class="card-body">
                @foreach($widget['dbelum'] as $dbelum)
                <?php $a = explode('-', $dbelum); ?>
                <h4 class="small font-weight-bold"><?= $a[0]; ?><span class="float-right"><?= $a[1].' Transaksi '.$a[0].' dari '.$a[3].' ( '.$a[2].' )'; ?></span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-<?php
                    if($loop->iteration%4==4){
                        echo 'success';
                    }
                    if($loop->iteration%4==3){
                        echo 'info';
                    }
                    if($loop->iteration%4==2){
                        echo 'warning';
                    }
                    if($loop->iteration%4==1){
                        echo 'danger';
                    }
                    ?>" role="progressbar" style="width: <?= $a[2]; ?>" aria-valuenow="<?= $a[1]; ?>" aria-valuemin="0" aria-valuemax="<?= $a[3]; ?>"></div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="col-lg-6 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Transaksi Sudah Selesai</h6>
            </div>
            <div class="card-body">
                @foreach($widget['dsudah'] as $dsudah)
                <?php $a = explode('-', $dsudah); ?>
                <h4 class="small font-weight-bold"><?= $a[0]; ?><span class="float-right"><?= $a[1].' Transaksi '.$a[0].' dari '.$a[3].' ( '.$a[2].' )'; ?></span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-<?php
                    if($loop->iteration%4==4){
                        echo 'success';
                    }
                    if($loop->iteration%4==3){
                        echo 'info';
                    }
                    if($loop->iteration%4==2){
                        echo 'warning';
                    }
                    if($loop->iteration%4==1){
                        echo 'danger';
                    }
                    ?>" role="progressbar" style="width: <?= $a[2]; ?>" aria-valuenow="<?= $a[1]; ?>" aria-valuemin="0" aria-valuemax="<?= $a[3]; ?>"></div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-lg-12 mb-8">

        <!-- Illustrations -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Pengenalan Aplikasi E-Notaris</h6>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="{{ asset('img/svg/undraw_editable_dywm.svg') }}" alt="">
                </div>
                <p>Aplikasi E-Notaris Berbasis Website adalah Sebuah Aplikasi Yang Dibuat Menggunakan Framework Laravel dan Menggunakan Bahasa PHP, JS, HTML, CSS dan Untuk Databasenya Sendiri Menggunakan MYSQL</p>
            </div>
        </div>

    </div>
</div>
@endsection
@section('js')
@endsection
