@extends('layouts.admin')
@section('css')
@include('dashboard.chat.csss')
@endsection
@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('home')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{url('chat')}}">Chat</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Chat User</li>
                </ol>
            </nav>
        </div>
        <!-- Begin Page Content -->
        <div class="card col-lg-12">
            <div class="col-12 col-lg-12 col-xl-12">
                <div class="position-relative">
                    <div class="chat-messages p-4">
                        @foreach($data['chat'] as $data)
                        @if($data->id_pengirim==0)
                        <div class="chat-message-right pb-4">
                            <div>
                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40">
                                <div class="text-muted small text-nowrap mt-2">{{$data->tgltime($data->created_at)}}</div>
                            </div>
                            <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
                                <div class="font-weight-bold mb-1">{{Auth()->user()->name}}</div>
                                {{$data->pesan}}
                            </div>
                        </div>
                        @elseif($data->id_pengirim!=0)
                        <div class="chat-message-left pb-4">
                            <div>
                                <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
                                <div class="text-muted small text-nowrap mt-2">{{$data->tgltime($data->created_at)}}</div>
                            </div>
                            <div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
                                <div class="font-weight-bold mb-1">{{$data->name}}</div>
                                {{$data->pesan}}
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
                <form class="flex-grow-0 py-3 px-4 border-top" action="{{url('pesanchat/'.$penerima)}}" method="post">
                    <div class="input-group">
                        @csrf
                        <input type="text" name="pesan" class="form-control @error('pesan') is-invalid @enderror" placeholder="Type your message" required="">
                        &nbsp;
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
@endsection