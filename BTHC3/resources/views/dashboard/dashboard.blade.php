<h1>Dashboard</h1>

<a href="{{ route('employees.index') }}">Về danh sách nhân viên</a>
<p>Tổng NV: {{ $totalEmp }}</p>
<p>Tổng PB: {{ $totalDep }}</p>

<h3>Nhân viên mới</h3>

@foreach($newEmp as $e)
    <p>{{ $e->name }}</p>
@endforeach

