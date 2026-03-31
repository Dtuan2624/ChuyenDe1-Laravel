@extends('layout')
@section('content')
<h2>Danh sách sinh viên</h2>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<a href="{{ route('students.create') }}" class="btn btn-success mb-2">Thêm sinh viên</a>

<table class="table table-bordered">
<tr>
<th>Tên</th><th>Email</th><th>Ngành</th><th>Tổng tín chỉ</th>
</tr>
@foreach($students as $s)
<tr>
<td>{{ $s->name }}</td>
<td>{{ $s->email }}</td>
<td>{{ $s->major }}</td>
<td>{{ $s->totalCredits() }}</td>
</tr>
@endforeach
</table>

{{ $students->links() }}
@endsection