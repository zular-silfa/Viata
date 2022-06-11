@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  <h1>Ubah data makanan</h1>
@stop

@section('content')
  <div class="card">
    <div class="card-body">
      <form action="{{route('makanan.update', $makanan)}}" method="POST" class="row">
        @csrf
        @method('PUT')
        <x-adminlte-input value="{{ $makanan->nama }}" name="nama" label="Nama" fgroup-class="col-12" />

        <x-adminlte-select name="jenis" label="Jenis" fgroup-class="col-5 col-md-2">
          <option value="WET" {{ $makanan->jenis == 'WET' ? 'selected' : '' }}>Basah</option>
          <option value="DRY" {{ $makanan->jenis == 'DRY' ? 'selected' : '' }}>Kering</option>
        </x-adminlte-select>


        <x-adminlte-input value="{{ $makanan->harga }}" name="harga" label="Harga" fgroup-class="col-12" />

        <x-adminlte-textarea name="detail" label="Detail" fgroup-class="col-12" rows=5>
          {{ $makanan->detail }}
        </x-adminlte-textarea>

        <div class="col-12">
          <x-adminlte-button label="Save" theme="primary" type="submit" />
          <a href="{{ route('makanan.index') }}">
            <x-adminlte-button label="Cancel" class="ml-2" />
          </a>
        </div>
      </form>
    </div>
  </div>
@stop
