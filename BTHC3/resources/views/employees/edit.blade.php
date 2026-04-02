@extends('layouts.master')

@section('content')

<form method="POST" action="{{ route('employees.update', $employee->id) }}">
    @csrf
    @method('PUT')

    <input name="name" value="{{ $employee->name }}"><br>
    <input name="email" value="{{ $employee->email }}"><br>

    <select name="department_id">
        @foreach($departments as $d)
            <option value="{{ $d->id }}" 
                {{ $employee->department_id == $d->id ? 'selected' : '' }}>
                {{ $d->name }}
            </option>
        @endforeach
    </select>

    <button type="submit">Update</button>
</form>

@endsection