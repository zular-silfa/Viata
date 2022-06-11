@extends('adminlte::page')

@section('title', 'Edit Perawatan Kucing')

@section('content_header')
    <h1 class="m-0 text-dark">Edit Perawatan Kucing</h1>
@stop

@section('content')
    <form action="{{route('perawatan.update', $perawatan)}}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <div class="form-group">
                        <label for="exampleInputJenisKucing">Jenis Kucing</label>
                        <input type="text" class="form-control @error('jenis_kucing') is-invalid @enderror"
                        id="exampleInputJenisKucing" placeholder="Jenis Kucing" name="jenis-kucing"
                        value="{{$perawatan->jenis_kucing ?? old('jenis_kucing')}}">
                        @error('jenis_kucing') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFoto">Foto</label>
                        @if($perawatan->foto)
                         <img src="{{asset($perawatan->foto)}}" alt="" class="img-preview img-fluid mb-3 col-sm-5 d-block" style="width: 100px;">
                        @else
                        @endif
                        <input type="file" class="form-control @error('foto') is-invalid @enderror"
                        id="exampleInputFoto" placeholder="Foto" name="foto"
                        value="{{$perawatan->foto ?? old('foto')}}">
                        @error('foto') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group mb-0">
                        <label for="exampleInputCiriCiri">Ciri-Ciri</label>
                        <textarea class="form-control @error('ciri_ciri') is-invalid @enderror"
                        id="exampleInputCiriCiri" placeholder="Ciri-Ciri" name="ciri_ciri">{{$perawatan->ciri_ciri ?? old('ciri_ciri')}}</textarea>
                        @error('ciri_ciri') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group mb-0">
                        <label for="exampleInputPerawatan">Perawatan</label>
                        <textarea class="form-control @error('perawatan') is-invalid @enderror"
                        id="exampleInputPerawatan" placeholder="Perawatan" name="perawatan">{{$perawatan->perawatan ?? old('perawatan')}}</textarea>
                        @error('perawatan') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{route('perawatan.index')}}" class="btn btn-default">
                        Cancel
                    </a>
                </div>
            </div>
        </div>
    </div>

    </form>

@stop
