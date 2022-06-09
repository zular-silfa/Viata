@extends('adminlte::page')
@section('title', 'List Perawatan Kucing')
@section('content_header')
    <h1 class="m-0 text-dark">List Perawatan Kucing</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                   <a href="{{route('perawatan.create')}}" class="btn btn-primary mb-2">
                       Add
                   </a>
                   <table class="table table-hover table-bordered table stripped" id="example2">
                       <thead>
                           <tr>
                               <th>No.</th>
                               <th>Jenis Kucing</th>
                               <th>Foto</th>
                               <th>Ciri-Ciri</th>
                               <th>Perawatan</th>
                           </tr>
                       </thead>
                       <tbody>
                        @foreach($perawatan as $key => $perawatan)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$perawatan->jenis_kucing}}</td>
                                <td>
                                    <img src="{{ asset('fotokucing/'.$perawatan->foto)}}" alt="" style="width: 100px;">
                                </td>
                                <td>{{$perawatan->ciri_ciri}}</td>
                                <td>{{$perawatan->perawatan}}</td>
                                <td>
                                    <a href="{{route('perawatan.edit', $perawatan)}}" class="btn btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <a href="{{route('perawatan.destroy', $perawatan)}}"
                                        onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                       </tbody>
                   </table>
                </div>
            </div>
        </div>
    </div>
@stop
@push('js')
    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>
    <script>
        $('#example2').DataTable({
            "responsive": true,
        });
        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            if (confirm('Are you sure want to delete this data ?')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }
    </script>
@endpush
