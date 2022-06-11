@extends('adminlte::page')

@section('title', 'Edit Penyakit Kucing')

@section('content_header')
    <h1 class="m-0 text-dark">Edit Penyakit Kucing</h1>
@stop

@section('content')
    <form action="{{route('penyakit.update', $penyakit)}}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <div class="form-group">
                        <label for="exampleInputNama">Nama</label>
                        <input type="text" class="form-control @error('penyakit') is-invalid @enderror" 
                        id="exampleInputNama" placeholder="Nama" name="nama"
                        value="{{$penyakit->nama ?? old('nama')}}">
                        @error('nama') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group mb-0">
                        <label for="exampleInputDetail">Detail</label>
                        <textarea class="form-control @error('detail') is-invalid @enderror" 
                        id="exampleInputDetail" placeholder="Detail" name="detail">{{$penyakit->detail ?? old('detail')}}</textarea>
                        @error('detail') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFoto">Foto</label>
                        @if($penyakit->foto)
                         <img src="{{ asset('fotopenyakit/'.$penyakit->foto)}}" alt=""
                         class="img-preview img-fluid mb-3 col-sm-5 d-block" style="width: 100px;">
                        @else
                        @endif
                        <input type="file" class="form-control @error('foto') is-invalid @enderror" 
                        id="exampleInputFoto" placeholder="Foto" name="foto"
                        value="{{$penyakit->foto ?? old('foto')}}">
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