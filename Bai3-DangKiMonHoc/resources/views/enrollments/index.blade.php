@extends('layout')
@section('content')
<h2>Danh sách đăng ký môn</h2>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<a href="{{ route('enrollments.create') }}" class="btn btn-success mb-2">Đăng ký môn</a>

<table class="table table-bordered">
<tr>
<th>Sinh viên</th><th>Môn học</th><th>Tín chỉ</th>
</tr>
@foreach($enrollments as $e)
<tr>
<td>{{ $e->student->name }}</td>
<td>{{ $e->course->name }}</td>
<td>{{ $e->course->credits }}</td>
</tr>
@endforeach
</table>

{{ $enrollments->links() }}
@endsection