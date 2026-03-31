@extends('layout')

@section('content')

<h2>Danh sách sinh viên</h2>

<a href="{{ route('students.create') }}" class="btn btn-primary">Thêm</a>

<form method="GET" class="mt-2">
    <input name="keyword" placeholder="Tìm tên" class="form-control w-25 d-inline">
    <button class="btn btn-secondary">Tìm</button>
</form>

@if(session('success'))
<div class="alert alert-success mt-2">
{{ session('success') }}
</div>
@endif

<table class="table mt-3">
<tr>
    <th>Tên</th>
    <th>Ngành</th>
    <th>Email</th>
    <th>Action</th>
</tr>

@foreach($students as $s)
<tr>
    <td>{{ $s->name }}</td>
    <td>{{ $s->major }}</td>
    <td>{{ $s->email }}</td>
    <td>
        <a href="{{ route('students.edit',$s->id) }}" class="btn btn-warning">Sửa</a>

        <form method="POST" action="{{ route('students.destroy',$s->id) }}" style="display:inline">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Xóa</button>
        </form>
    </td>
</tr>
@endforeach
</table>

{{ $students->links() }}

@endsection