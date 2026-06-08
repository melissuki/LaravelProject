<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="d-flex">
    <div class="bg-dark text-white p-3" style="width: 250px; min-height: 100vh;">
        <h4>Admin Panel</h4>
        <hr>
        <ul class="nav flex-column">
            <li class="nav-item"><a href="{{ route('admin.dashboard') }}" class="nav-link text-white">Dashboard</a></li>
            <li class="nav-item"><a href="{{ route('admin.products') }}" class="nav-link text-white">Products</a></li>
            <li class="nav-item"><a href="{{ route('admin.orders') }}" class="nav-link text-white">Orders</a></li>
            <li class="nav-item"><a href="/" class="nav-link text-white">Back to Store</a></li>
        </ul>
    </div>
    <div class="flex-grow-1 p-4">
        @yield('content')
    </div>
</div>
</body>
</html>
