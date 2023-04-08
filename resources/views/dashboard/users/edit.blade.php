@extends('layouts.admin2')


@section('main-content')
<div class="container">
    <div class="card shadow">
        <h3 class="card-header">Edit Users</h3>
        <div class="card-body">
            <form action="{{url('updateManageUsers',$data->id)}}" method="POST">
                @method('patch')
                @csrf
                <div class="mt-2 ml-5">
                    <label for=""><strong> NIK</strong> </label>
                    <input type="text" class="form-control col-lg-8" value="{{$data->nik}}" name="nik">
                </div>
                <div class="mt-2 ml-5">
                    <label for=""><strong> NAMA</strong> </label>
                    <input type="text" class="form-control col-lg-8" value="{{$data->name}}" name="name">
                </div>
                <div class="mt-2 ml-5">
                    <label for=""><strong> EMAIL</strong> </label>
                    <input type="email" class="form-control col-lg-8" value="{{$data->email}}" name="email">
                </div>
                <div class="mt-2 ml-5">
                    <label for=""><strong> ROLE</strong> </label>
                    <select name="level" class="form-control col-lg-8" value="{{$data->level}}">
                        @if($data->level == 99)
                        <option value="99">Admin</option>
                        <option value="1">User</option>
                        @else
                        <option value="1">User</option>
                        <option value="99">Admin</option>
                        @endif
                    </select>
                </div>
                <div class="mt-5 mb-5 ml-5">
                    <button type="submit" class="btn btn-success col-2">Simpan</button>
                    <a href="{{url('users')}}" class="btn btn-info col-2">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection