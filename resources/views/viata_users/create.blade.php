@extends('adminlte::page')

@section('title', 'Tambah Users')

@section('content_header')
    <h1 class="m-0 text-dark">Tambah Users</h1>
@stop

@section('content')
    <form action="{{route('viata_users.store')}}" method="post">
        @csrf
        <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputNama">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" 
                        id="exampleInputNama" placeholder="Nama" name="nama"
                        value="{{old('nama')}}">
                        @error('nama') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername">Username</label>
                        <input type="username" class="form-control @error('username') is-invalid @enderror" 
                        id="exampleInputUsername" placeholder="Username" name="username"
                        value="{{old('username')}}">
                        @error('username') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Email</label>
                        <input type="email" class="form-control @error('ciri_ciri') is-invalid @enderror" 
                        id="exampleInputEmail" placeholder="Email" name="email"
                        value="{{old('email')}}">
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