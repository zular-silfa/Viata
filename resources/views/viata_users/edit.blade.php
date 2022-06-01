@extends('adminlte::page')

@section('title', 'Edit Users')

@section('content_header')
    <h1 class="m-0 text-dark">Edit Users</h1>
@stop

@section('content')
    <form action="{{route('viata_users.update', $viatausers)}}" method="post">
        @method('PUT')
        @csrf
        <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <div class="form-group">
                        <label for="exampleInputNama">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" 
                        id="exampleInputNama" placeholder="Nama" name="nama"
                        value="{{$viatausers->nama ?? old('nama')}}">
                        @error('nama') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername">Username</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" 
                        id="exampleInputFoto" placeholder="Username" name="username"
                        value="{{$viatausers->username ?? old('username')}}">
                        @error('username') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" 
                        id="exampleInputEmail" placeholder="Email" name="email"
                        value="{{$viatausers->email ?? old('email')}}">
                        @error('email') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{route('viata_users.index')}}" class="btn btn-default">
                        Cancel
                    </a>
                </div>
            </div>
        </div>
    </div>

    </form>
    
@stop