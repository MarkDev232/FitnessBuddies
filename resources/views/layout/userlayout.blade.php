<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'User Panel')</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    @yield('head') <!-- Allows child templates to add extra head content -->
</head>
<body class="d-flex flex-column min-vh-100">

    <!-- Navbar -->
    @include('components.usernavbar')

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 sidebar-bg text-white p-3 overflow-auto vh-100 position-fixed">
                @include('components.user-sidebar')
            </div>

            <!-- Main content -->
            <div class="col-md-9 col-lg-10 p-4" style="margin-left: 250px;">
                @yield('content') <!-- Child views insert their content here -->
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    @yield('scripts') <!-- Allows child templates to insert extra scripts -->
</body>
</html>
