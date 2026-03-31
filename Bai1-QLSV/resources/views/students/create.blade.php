@extends('layout')

@section('content')

<h2>Thêm sinh viên</h2>

<form method="POST" action="{{ route('students.store') }}">
    @csrf

    <input name="name" class="form-control mb-2" placeholder="Tên">
    @error('name')
        <div class="text-danger">{{ $message }}</div>
    @enderror

    <input name="major" class="form-control mb-2" placeholder="Ngành">
    @error('major')
        <div class="text-danger">{{ $message }}</div>
    @enderror

    <input name="email" class="form-control mb-2" placeholder="Email">
    @error('email')
        <div class="text-danger">{{ $message }}</div>
    @enderror

    <button class="btn btn-success">Thêm</button>
</form>
@endsection