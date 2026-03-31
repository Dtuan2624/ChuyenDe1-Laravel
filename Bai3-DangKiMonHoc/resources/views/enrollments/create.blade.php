@extends('layout')
@section('content')
<h2>Đăng ký môn học</h2>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    </ul>
</div>
@endif

<form action="{{ route('enrollments.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Sinh viên</label>
        <select name="student_id" class="form-control">
            <option value="">Chọn sinh viên</option>
            @foreach($students as $s)
            <option value="{{ $s->id }}">{{ $s->name }} (Tín chỉ: {{ $s->totalCredits() }})</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Môn học</label>
        <select name="course_id" class="form-control">
            <option value="">Chọn môn học</option>
            @foreach($courses as $c)
            <option value="{{ $c->id }}">{{ $c->name }} ({{ $c->credits }} tín chỉ)</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Đăng ký</button>
</form>
@endsection