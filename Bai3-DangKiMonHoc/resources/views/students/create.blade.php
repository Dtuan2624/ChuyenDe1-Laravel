@extends('layout')
@section('content')
<h2>Thêm sinh viên</h2>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    </ul>
</div>
@endif

<form action="{{ route('students.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Tên</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email') }}">
    </div>
    <div class="mb-3">
        <label>Ngành</label>
        <input type="text" name="major" class="form-control" value="{{ old('major') }}">
    </div>
    <button type="submit" class="btn btn-primary">Thêm</button>
</form>
@endsection