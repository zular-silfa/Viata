@extends('adminlte::page')
@section('title', 'List Penyakit Kucing')
@section('content_header')
    <h1 class="m-0 text-dark">List Penyakit Kucing</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                   <a href="{{route('penyakit.create')}}" class="btn btn-primary mb-2">
                       Add
                   </a>
                   <table class="table table-hover table-bordered table stripped" id="example2">
                       <thead>
                           <tr>
                               <th>No.</th>
                               <th>Nama</th>
                               <th>Detail</th>
                               <th>Foto</th>
                           </tr>
                       </thead>
                       <tbody>
                        @foreach($penyakit as $key => $penyakit)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$penyakit->nama}}</td>
                                <td>{{$penyakit->detail}}</td>
                                <td>
                                    <img src="{{ asset('fotopenyakit/'.$penyakit->foto)}}" alt="" style="width: 100px;">
                                </td>
                                <td>
                                    <a href="{{route('penyakit.edit', $penyakit)}}" class="btn btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <a href="{{route('penyakit.destroy', $penyakit)}}"
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
