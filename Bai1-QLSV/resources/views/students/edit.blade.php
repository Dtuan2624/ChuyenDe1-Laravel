@extends('layout')

@section('content')

<h2>Sửa sinh viên</h2>

<form method="POST" action="{{ route('students.update', $student->id) }}">
    @csrf
    @method('PUT')

    <input name="name" 
           value="{{ old('name', $student->name) }}" 
           class="form-control mb-2" 
           placeholder="Tên">
    @error('name')
        <div class="text-danger">{{ $message }}</div>
    @enderror

    <input name="major" 
           value="{{ old('major', $student->major) }}" 
           class="form-control mb-2" 
           placeholder="Ngành">
    @error('major')
        <div class="text-danger">{{ $message }}</div>
    @enderror

    <input name="email" 
           value="{{ old('email', $student->email) }}" 
           class="form-control mb-2" 
           placeholder="Email">
    @error('email')
        <div class="text-danger">{{ $message }}</div>
    @enderror

    <button class="btn btn-success">Cập nhật</button>
</form>

@endsection