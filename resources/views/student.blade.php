@extends('adminlte::page')

@section('content_header')
    <h1>Student management</h1>
@stop

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <a href="/add/student" class="btn btn-success btn-sm float-end">Add new student</a>
            </div>
            @if (Session::has('success'))
                <span class="alert alert-success p-2" >{{Session::get('success')}}</span>
            @endif
            @if (Session::has('fail'))
                <span class="alert alert-danger p-2" >{{Session::get('fail')}}</span>
            @endif
            <div class="card-body">
                <table class="table table-sm table-striped">
                    <thead>
                        <th>#</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Birthday</th>
                        <th>phone</th>
                        <th>Major</th>
                        <th colspan="2">Action</th>
                    </thead>
                    <tbody>
                        @if (count($all_student) > 0)
                            @foreach ($all_student as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->gender}}</td>
                                    <td>{{$item->birthday}}</td>
                                    <td>{{$item->phone}}</td>
                                    <td>{{$item->major}}</td>
                                    <td><a href="edit/{{$item->id}}" class="btn btn-primary btn-sm">Edit</a></td>
                                    <td><a href="delete/{{$item->id}}" class="btn btn-danger btn-sm">Delete</a></td>
                                </tr>
                            @endforeach
                        @else 
                            <tr>
                                <td colspan="6" style="text-align: center;">No Student found!</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop