@extends('layout')
@section('content')
<h2>Danh sách môn học</h2>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<a href="{{ route('courses.create') }}" class="btn btn-success mb-2">Thêm môn học</a>

<table class="table table-bordered">
<tr>
<th>Tên môn</th><th>Số tín chỉ</th>
</tr>
@foreach($courses as $c)
<tr>
<td>{{ $c->name }}</td>
<td>{{ $c->credits }}</td>
</tr>
@endforeach
</table>

{{ $courses->links() }}
@endsection