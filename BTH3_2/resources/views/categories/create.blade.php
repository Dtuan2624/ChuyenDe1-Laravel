@extends('layout.master')

@section('content')

<h3>Thêm danh mục</h3>

<form method="POST" action="{{ route('categories.store') }}">
    @csrf

<div class="mb-3">
    <label class="form-label">Tên danh mục</label>
    <input class="form-control" name="name">
</div>

<button class="btn btn-primary">Thêm</button>

</form>

@endsection