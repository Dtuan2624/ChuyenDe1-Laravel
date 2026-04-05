@extends('layout.master')

@section('content')

<h3>Cập nhật sản phẩm</h3>

<form method="POST" enctype="multipart/form-data" action="{{ route('products.update',$product->id) }}">
@csrf @method('PUT')

<div class="mb-3">
    <label class="form-label">Tên</label>
    <input class="form-control" name="name" value="{{ $product->name }}">
</div>

<div class="mb-3">
    <label class="form-label">Giá</label>
    <input class="form-control" name="price" value="{{ $product->price }}">
</div>

<div class="mb-3">
    <label class="form-label">Số lượng</label>
    <input class="form-control" name="quantity" value="{{ $product->quantity }}">
</div>

<div class="mb-3">
    <label class="form-label">Danh mục</label>
    <select class="form-select" name="category_id">
        @foreach($categories as $c)
            <option value="{{ $c->id }}" {{ $c->id == $product->category_id ? 'selected' : '' }}>
                {{ $c->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Ảnh</label>
    <input type="file" class="form-control" name="image">
</div>

<button class="btn btn-success">Cập nhật</button>

</form>

@endsection