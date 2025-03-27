<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        body {
            font-family: 'Figtree', sans-serif;
        }
        .sidebar {
            min-height: 100vh;
        }
        .sidebar .nav-link {
            color: white;
        }
        .sidebar .nav-link:hover {
            background-color: #343a40;
        }
    </style>
</head>
<body class="bg-light">
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar bg-dark text-white p-4">
            <h1 class="h4">Admin Panel</h1>
            <nav class="nav flex-column mt-4">
                <a class="nav-link" href="{{ route('admin.services.index') }}">Manage Services</a>
                <a class="nav-link" href="{{ route('admin.users.index') }}">Manage Users</a>
                <a class="nav-link" href="{{ route('admin.orders.index') }}">Manage Orders</a>
                <a class="nav-link" href="{{ route('admin.portofolios.index') }}">Manage Portofolios</a>
                <a class="nav-link" href="{{ route('admin.teams.index') }}">Manage Teams</a>
                <a class="nav-link" href="{{ route('admin.tasks.index') }}">Manage Tasks</a>
                <a class="nav-link" href="{{ route('admin.pelamars.index') }}">Manage Pelamars</a>
                <a class="nav-link" href="{{ route('admin.lowongans.index') }}">Manage Lowongans</a>
                <a class="nav-link" href="{{ route('admin.documents.index') }}">Manage Documents</a> <!-- Menu Mengelola Dokumen -->
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-grow-1 p-4">
            <div class="bg-white p-4 rounded shadow-sm">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
