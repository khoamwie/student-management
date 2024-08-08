@extends('adminlte::page')

@section('content_header')
    <h1>{{ $studentData != null ? 'Edit Student' : 'Create Student' }}</h1>
@stop

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                {{ $studentData != null ? 'Edit student' : 'Add new student' }}
            </div>
            @if (Session::has('success'))
                <span class="alert alert-success p-2" >{{Session::get('success')}}</span>
            @endif
            @if (Session::has('fail'))
                <span class="alert alert-danger p-2" >{{Session::get('fail')}}</span>
            @endif
            <div class="card-body">
                <form action="{{ $studentData == null ? route('create') : route('update') }}" method="post">
                    @csrf
                    <input type="hidden" name="student_id" id="" value="{{ $studentData == null ? '' : $studentData->id }}">
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" value="{{ $studentData == null ? old('name') : $studentData->name }}" name="name" class="form-control" id="name">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select name="gender" class="form-control form-select-lg mb-3" aria-label="Default select example">
                            <option {{$studentData == null ? 'selected' : ''}}>Select gender</option>
                            <option value="1" {{ $studentData == null ? (old('gender') == '1' ? 'selected' : '') : ($studentData->gender == 'Nam' ? 'selected' : '') }}>Nam</option>
                            <option value="2" {{ $studentData == null ? (old('gender') == '2' ? 'selected' : '') : ($studentData->gender == 'Nữ' ? 'selected' : '') }}>Nữ</option>
                            <option value="3" {{ $studentData == null ? (old('gender') == '3' ? 'selected' : '') : ($studentData->gender == 'Khác' ? 'selected' : '') }}>Khác</option>
                        </select>
                        @error('gender')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="birthday" class="form-label">Birthday</label>
                        <input type="date" value="{{ $studentData == null ? old('birthday') : $studentData->birthday}}" name="birthday" class="form-control" id="birthday">
                        @error('birthday')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">phone</label>
                        <input type="text" value="{{ $studentData == null ? old('phone') : $studentData->phone }}" name="phone" class="form-control" id="phone">
                        @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="major" class="form-label">Major</label>
                        <input type="text" value="{{ $studentData == null ? old('major') : $studentData->major }}" name="major" class="form-control" id="major">
                        @error('major')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <button class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script>
        console.log("Hi, I'm using the Laravel-AdminLTE package!");
    </script>
@stop
