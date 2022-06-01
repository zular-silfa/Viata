@extends('adminlte::page')
@section('title', 'List Users')
@section('content_header')
    <h1 class="m-0 text-dark">List Users</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                   <table class="table table-hover table-bordered table stripped" id="example2">
                       <thead>
                           <tr>
                               <th>No.</th>
                               <th>Nama</th>
                               <th>Username</th>
                               <th>Email</th>
                           </tr>
                       </thead>
                       <tbody>
                        @foreach($viata_users as $key => $viatausers)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$viatausers->nama}}</td>
                                <td>{{$viatausers->username}}</td>
                                <td>{{$viatausers->email}}</td>
                                <td>
                                    <a href="{{route('viata_users.edit', $viatausers)}}" class="btn btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <a href="{{route('viata_users.destroy', $viatausers)}}"
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
