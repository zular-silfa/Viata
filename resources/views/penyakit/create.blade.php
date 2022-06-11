@extends('adminlte::page')

@section('title', 'Tambah Penyakit Kucing')

@section('content_header')
    <h1 class="m-0 text-dark">Tambah Penyakit Kucing</h1>
@stop

@section('content')
    <form action="{{route('penyakit.store')}}" method="post" enctype="multipart/form-data">
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
                    <div class="form-group mb-0">
                        <label for="exampleInputDetail">Detail</label>
                        <textarea class="form-control @error('detail') is-invalid @enderror" 
                        id="exampleInputDetail" placeholder="Detail" name="detail"
                        value="{{old('detail')}}"></textarea>
                        @error('detail') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFoto">Foto</label>
                        <input type="file" class="form-control @error('foto') is-invalid @enderror" 
                        id="exampleInputFoto" placeholder="Foto" name="foto"
                        value="{{old('foto')}}">
                        @error('foto') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{route('penyakit.index')}}" class="btn btn-default">
                        Cancel
                    </a>
                </div>
            </div>
        </div>
    </div>

    </form>
    
@stop