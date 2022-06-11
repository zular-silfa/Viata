@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  <h1>Tambah makanan kucing</h1>
@stop

@section('content')
  <div class="card">
    <div class="card-body">
      <form action="{{ route('makanan.store') }}" method="POST" class="row">
        @csrf
        <x-adminlte-input value="{{ old('nama') }}" name="nama" label="Nama" fgroup-class="col-12" />

        <x-adminlte-select name="jenis" label="Jenis" fgroup-class="col-5 col-md-2">
          <option value="WET">Basah</option>
          <option value="DRY">Kering</option>
        </x-adminlte-select>

        <x-adminlte-input value="{{ old('harga') }}" name="harga" type="number" label="Harga"
          fgroup-class="col-12" />

        <x-adminlte-textarea value="{{ old('detail') }}" name="detail" label="Detail" fgroup-class="col-12"
          rows=5 />

        <div class="col-12">
          <x-adminlte-button label="Save" theme="primary" type="submit" />
          <a href="{{ route('makanan.index') }}">
            <x-adminlte-button label="Cancel" class="ml-1" />
          </a>
        </div>
      </form>
    </div>
  </div>
@stop
