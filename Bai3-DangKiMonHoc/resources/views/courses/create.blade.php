@extends('layout')
@section('content')
<h2>Thêm môn học</h2>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    </ul>
</div>
@endif

<form action="{{ route('courses.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Tên môn học</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
    </div>
    <div class="mb-3">
        <label>Số tín chỉ</label>
        <input type="number" name="credits" class="form-control" value="{{ old('credits') }}" min="1" max="18">
    </div>
    <button type="submit" class="btn btn-primary">Thêm</button>
</form>
@endsection