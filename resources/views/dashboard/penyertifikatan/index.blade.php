@extends('layouts.admin2')
@section('main-content')


<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center justify-items-center h3">
            <a href="{{route('home')}}">{{ __('Dashboard') }}</a> / 
            <a href="{{url('penyertifikatans')}}">{{ __('Penyertifikat') }}</a>
        </div>
    </div>
</div>

<!-- Begin Page Content -->
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow ">
            <div class="card-body">
                <h3 class=" font-weight-bold text-primary text-center">DATA PENYERTIFIKATAN</h3>
                <a href="" data-toggle="modal" data-target="#TambahModal" class="btn btn-sm btn-primary mb-3"><i class="fa fa-plus"></i> Tambah </a> 
                <div class="table-responsive">
                    <table class="table table-hover" id="dataTable">
                        <thead align="left">
                            <tr>
                                <th class="text-center" scope="col">NO</th>
                                <th class="text-center" scope="col">TANGGAL</th>
                                <th class="text-center" scope="col">NIK</th>
                                <th class="text-center" scope="col">STATUS</th>
                                <th class="text-center" scope="col">ACTION</th>
                            </tr>
                        </thead>
                        <tbody align="left">
                            @foreach ($data as $data)
                            <tr>
                                <th class="text-center" scope="row">{{$loop->iteration}}</th>
                                <td class="text-center">{{$data->tanggal}}</td>
                                <td class="text-center" >{{$data->nik}}</td>
                                <td class="text-center">
                                    @if($data->status == 1)
                                    <span class="badge badge-primary">Selesai</span>
                                    @elseif($data->status == 2)
                                    <span class="badge badge-danger">Belum</span>
                                    @else
                                    <span class="badge badge-warning">Error</span>
                                    @endif
                                </td>

                                <td class="text-center">
                                    <a href="{{url('detailPenyertifikatan',$data->id)}}" class="btn btn-sm btn-info">Detail</a>
                                    <a href="{{url('editPenyertifikatan',$data->id)}}" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="#" class="btn btn-sm btn-danger pull-right" data-toggle="modal" data-target="#hapusModal">Hapus</a>

                                    @if($data->cek($data->nik)=='ada')
                                    @if($data->ket == 'lunas' && $data->pembayaran == 'sudah')
                                    <a href="{{url('bayarPenyertifikatan',$data->id)}}" class="btn btn-sm btn-success">Pembayaran</a>
                                    @elseif($data->ket == 'dp' && $data->pembayaran == 'sudah')
                                    <a href="{{url('bayarPenyertifikatan',$data->id)}}" class="btn btn-sm btn-success">DP</a>
                                    @elseif($data->pembayaran == 'konfirm' && $data->ket == 'sudah')
                                    <span class="badge badge-primary p-2">LUNAS</span>
                                    @endif
                                    @endif

                                    @if($data->cek($data->nik)=='gak')
                                    @if($data->pembayaran=='belum' && $data->ket=='bayar')
                                    <a href="{{url('bayarPenyertifikatanA',$data->id)}}" class="btn btn-sm btn-success">Pembayaran</a>
                                    @elseif($data->pembayaran=='sudah' && $data->ket=='dp')
                                    <a href="{{url('bayarPenyertifikatanA',$data->id)}}" class="btn btn-sm btn-success">DP</a>
                                    @elseif($data->pembayaran=='konfirm' && $data->ket=='lunas')
                                    <span class="badge badge-primary p-2">LUNAS</span>
                                    @endif
                                    @endif 

                                    <form action="{{url('hapusPenyertifikatan',$data->id)}}" method="post">
                                        @method('delete')
                                        @csrf
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
                <form action="{{url('tambahPenyertifikatan')}}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="mb-2">
                        <label for="">Tanggal</label>
                        <input type="text" class="form-control" name="tanggal" value='{{date("d/m/Y")}}' readonly>
                    </div>
                    <div class="mb-2">
                        <label for="">NIK</label>
                        <input type="text" class="form-control" name="nik" required>
                    </div>
                    <div class="mb-2">
                        <label for="">Fotocopy C Desa / Letter C / Petok D</label>
                        <input type="file" class="form-control" name="fcSurat" required>
                    </div>
                    <div class="mb-2">
                        <label for="">Fotocopy KTP Pemohon</label>
                        <input type="file" class="form-control" name="fcKtpPemohon" required>
                    </div>
                    <div class="mb-2">
                        <label for="">Fotocopy KK Pemohon</label>
                        <input type="file" class="form-control" name="fcKkPemohon" required>
                    </div>
                    <div class="mb-2">
                        <label for="">Kematian</label>
                        <input type="file" class="form-control" name="kematian" required>
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
@endsection

@section('js')

<script src="{{asset('admin/assets/extra-libs/DataTables/datatables.min.js')}}"></script>
<script>
   $('#dataTable').DataTable();
</script>

@endsection