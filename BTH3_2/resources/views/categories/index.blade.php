@extends('layout.master')

@section('content')

<div class="d-flex justify-content-between mb-3">
    <h3>Danh mục</h3>
    <a href="{{ route('categories.create') }}" class="btn btn-primary">+ Thêm</a>
</div>

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th width="150">Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach($categories as $c)
        <tr>
            <td>{{ $c->id }}</td>
            <td>{{ $c->name }}</td>
            <td>
                <a href="{{ route('categories.edit',$c->id) }}" class="btn btn-warning btn-sm">Sửa</a>

                <form method="POST" action="{{ route('categories.destroy',$c->id) }}" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Xóa?')">Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $categories->links() }}

@endsection