@extends('layout.master')

@section('content')

<h3 class="mb-4">Dashboard</h3>

<div class="row mb-4">
    <div class="col-md-6">
        <div class="card text-white bg-primary p-3">
            <h5>Tổng sản phẩm</h5>
            <h2>{{ $totalProducts }}</h2>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card text-white bg-success p-3">
            <h5>Tổng danh mục</h5>
            <h2>{{ $totalCategories }}</h2>
        </div>
    </div>
</div>

<div class="card p-3">
    <h5>5 sản phẩm mới</h5>
    <ul class="list-group">
        @foreach($latestProducts as $p)
            <li class="list-group-item">{{ $p->name }}</li>
        @endforeach
    </ul>
</div>

@endsection