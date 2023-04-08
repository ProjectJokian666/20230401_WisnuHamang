@extends('layouts.admin2')
@section('main-content')


<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center justify-items-center h3">
            <a href="{{route('home')}}">{{ __('Dashboard') }}</a> / 
            <a href="{{url('chat')}}">{{ __('Manage User') }}</a>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="card shadow ">
            <div class="card-body">
                <h3 class=" font-weight-bold text-primary text-center">DATA USER</h3>
                <a href="" data-toggle="modal" data-target="#TambahModal" class="btn btn-sm btn-primary mb-3"><i class="fa fa-plus"></i> Tambah </a> 
                <div class="table-responsive">
                    <table class="table table-hover" id="dataTable">
                        <thead align="left">
                            <tr>
                                <th class="text-center" scope="col">NO</th>
                                <th class="text-center" scope="col">NIK</th>
                                <th class="text-center" scope="col">NAMA</th>
                                <th class="text-center" scope="col">EMAIL</th>
                                <th class="text-center" scope="col">ROLE</th>
                                <th class="text-center" scope="col">ACTION</th>
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
                                    @if($data->level == 99)
                                    <span class="badge badge-primary">Admin</span>
                                    @else
                                    <span class="badge badge-warning">User</span>
                                    @endif
                                </td>

                                <td class="text-center">
                                    <form action="{{url('hapusManageUsers',$data->id)}}" method="post">
                                        @method('delete')
                                        @csrf
                                        <a href="{{url('editManageUsers',$data->id)}}" class="btn btn-sm btn-warning">Edit</a>
                                        <a href="#" class="btn btn-sm btn-danger pull-right" data-toggle="modal" data-target="#hapusModal">Hapus</a>

                                        <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">{{ __('Ready to Leave?') }}</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">Apakah Anda Yakin Menghapus Data ?</div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-info" type="button" data-dismiss="modal">{{ __('Cancel') }}</button>
                                                        <button class="btn btn-danger" type="submit">Yakin</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
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

<div class="modal fade " id="TambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Baru</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('tambahManageUsers')}}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="mb-2">
                        <label for="">NIK</label>
                        <input type="text" class="form-control" name="nik" required>
                    </div>
                    <div class="mb-2">
                        <label for="">Nama</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="mb-2">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="mb-2">
                        <label for="">Password</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <div class="mb-2">
                        <label for="">Role</label>
                        <select class="form-control" name="level">
                            <option value="1">User</option>
                            <option value="99">Admin</option>
                        </select>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-sm btn-success" style="width: 200px;"> Simpan </button>
                        <button type="reset" class="btn btn-sm btn-danger"> Reset </button>
                    </div>
                </form>
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