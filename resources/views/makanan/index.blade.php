@php
$heads = ['No.', 'Nama', 'Jenis', 'Detail', 'Harga', 'Aksi'];
@endphp


@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  <h1>List makanan kucing</h1>
@stop

@section('content')
  <div class="card">
    <div class="card-body">
      <a href="{{ route('makanan.create') }}">
        <x-adminlte-button class="mb-4" label="Tambah" theme="primary" />
      </a>
      <x-adminlte-datatable id="table1" :heads="$heads">
        @foreach ($makanan as $key => $row)
          <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $row->nama }}</td>
            <td>{{ $row->jenis == 'WET' ? 'Basah' : 'Kering' }}</td>
            <td>{{ $row->detail }}</td>
            <td>{{ $row->harga }}</td>
            <td>
              <a href="{{ route('makanan.edit', $row) }}" class="btn btn-primary btn-xs">
                Edit
              </a>
              <a href="{{ route('makanan.destroy', $row) }}" onclick="notificationBeforeDelete(event, this)"
                class="btn btn-danger btn-xs">
                Delete
              </a>
            </td>
          </tr>
        @endforeach
      </x-adminlte-datatable>
    </div>
  </div>
@stop

@push('js')
  <form action="" id="delete-form" method="post">
    @method('delete')
    @csrf
  </form>
  <script>
    function notificationBeforeDelete(event, el) {
      event.preventDefault();
      if (confirm('Are you sure want to delete this data ?')) {
        $("#delete-form").attr('action', $(el).attr('href'));
        $("#delete-form").submit();
      }
    }
  </script>
@endpush
