@extends('layouts.admin2')


@section('main-content')

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center justify-items-center h3">
            <a href="{{route('home')}}">{{ __('Dashboard') }}</a> / 
            <a href="{{url('chat')}}">{{ __('Chat User') }}</a>
        </div>
    </div>
</div>



<div class="row">
    <!-- Begin Page Content -->
    <div class="col-lg-12">
        <div class="card shadow ">
            <div class="card-body">
                <h3 class=" font-weight-bold text-primary text-center">DATA CHAT USER</h3>
                <div class="table-responsive">
                    <table class="table table-hover" id="dataTable">
                        <thead align="left">
                            <tr>
                                <th class="text-center" scope="col">NO</th>
                                <th class="text-center" scope="col">NIK</th>
                                <th class="text-center" scope="col">NAMA</th>
                                <th class="text-center" scope="col">EMAIL</th>
                                <th class="text-center" scope="col">PESAN BARU</th>
                                <th class="text-center" scope="col">LIHAT</th>
                            </tr>
                        </thead>
                        <tbody align="left">
                            @foreach ($data as $data)
                            <tr>
                                <th class="text-center" scope="row">{{$loop->iteration}}</th>
                                <td class="text-center" >{{$data->nik}}</td>
                                <td class="text-center" >{{$data->name}}</td>
                                <td class="text-center" >{{$data->email}}</td>

                                <td class="text-center">
                                    <span class="badge badge-primary">
                                        &emsp;{{$data->pesan($data->id)}} Pesan Baru&emsp;
                                    </span>
                                </td>

                                <td class="text-center">
                                    <a href="{{url('/detailchat',$data->id)}}" class="btn btn-sm btn-primary">Chats</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{asset('admin/assets/extra-libs/DataTables/datatables.min.js')}}"></script>
<script>
   $('#dataTable').DataTable();
</script>
@endsection