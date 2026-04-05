@extends('layout.master')

@section('content')

<h3>Cập nhật danh mục</h3>

<form method="POST" action="{{ route('categories.update',$category->id) }}">
@csrf @method('PUT')

<div class="mb-3">
    <label class="form-label">Tên danh mục</label>
    <input class="form-control" name="name" value="{{ $category->name }}">
</div>

<button class="btn btn-success">Cập nhật</button>

</form>

@endsection