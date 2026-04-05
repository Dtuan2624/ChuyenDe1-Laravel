@extends('layout.master')

@section('content')

<div class="d-flex justify-content-between mb-3">
    <h3>Danh sách sản phẩm</h3>
    <a href="{{ route('products.create') }}" class="btn btn-primary">+ Thêm</a>
</div>

<form class="row g-2 mb-3">
    <div class="col-md-4">
        <input class="form-control" name="keyword" placeholder="Tìm sản phẩm...">
    </div>

    <div class="col-md-3">
        <select class="form-select" name="sort">
            <option value="">Sắp xếp</option>
            <option value="asc">Giá tăng</option>
            <option value="desc">Giá giảm</option>
        </select>
    </div>

    <div class="col-md-2">
        <button class="btn btn-success">Tìm</button>
    </div>
</form>

<table class="table table-bordered table-hover">
    <thead class="table-dark">
        <tr>
            <th>Tên</th>
            <th>Giá</th>
            <th>Danh mục</th>
            <th>Ảnh</th>
            <th width="180">Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach($products as $p)
        <tr>
            <td>{{ $p->name }}</td>
            <td>{{ number_format($p->price, 0, ',', '.') }} ₫</td>
            <td>{{ $p->category->name }}</td>
            <td>
                @if($p->image)
                    <img src="{{ asset('storage/'.$p->image) }}" width="70" class="img-thumbnail">
                @endif
            </td>
            <td>
                <a href="{{ route('products.edit',$p->id) }}" class="btn btn-warning btn-sm">Sửa</a>

                <form method="POST" action="{{ route('products.destroy',$p->id) }}" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Xóa?')">Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div>
    {{ $products->links('pagination::bootstrap-5') }}
</div>

@endsection