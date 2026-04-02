@extends('layouts.master') 
@section('title', 'Danh sách nhân viên') 
@section('content') 
<a href="{{ route('employees.create') }}">Thêm nhân viên</a> 
@if(session('success')) 
<p style="color: green">{{ session('success') }}</p> @endif <table border="1"> 
    <tr> 
        <th>ID</th> 
        <th>Name</th> 
        <th>Email</th> 
        <th>Department</th> 
        <th>Action</th> 
    </tr> 
    @forelse($employees as $emp) 
    <tr> 
        <td>{{ $emp->id }}</td> 
        <td>{{ $emp->name }}</td> 
        <td>{{ $emp->email }}</td> 
        <td>{{ $emp->department->name ?? '' }}</td> 
        <td> 
            <a href="{{ route('employees.edit', $emp->id) }}">Edit</a> 
            <form action="{{ route('employees.destroy', $emp->id) }}" method="POST"> 
                @csrf @method('DELETE') 
                <button>Xóa</button> 
            </form> 
        </td> 
    </tr> 
    @empty 
    <tr>
        <td colspan="5">Không có dữ liệu</td>
    </tr> 
    @endforelse 
</table> 
{{ $employees->links() }}

@endsection