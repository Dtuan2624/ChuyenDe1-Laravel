@extends('layouts.master') 
@section('content') 
<form method="POST" action="{{ route('employees.store') }}"> 
    @csrf 
    <input name="name" placeholder="Tên"><br> 
    <input name="email" placeholder="Email"><br> 
    <select name="department_id"> @foreach($departments as $d) 
        <option value="{{ $d->id }}">{{ $d->name }}

        </option>
         @endforeach 
    </select> 
    <button type="submit">Lưu</button> 
</form> 
@endsection