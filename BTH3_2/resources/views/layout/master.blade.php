<!DOCTYPE html>
<html>
<head>
    <title>Product Manager</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    svg {
    width: 16px !important;
    height: 16px !important;
    }
</style>
<body>

<nav class="navbar navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="/">Dashboard</a>
        <a class="btn btn-light" href="{{ route('products.index') }}">Products</a>
        <a class="btn btn-light" href="{{ route('categories.index') }}">Categories</a>
    </div>
</nav>

<div class="container">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @yield('content')

</div>

</body>
</html>