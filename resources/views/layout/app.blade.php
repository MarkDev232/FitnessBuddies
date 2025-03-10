<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name', 'Laravel'))</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    @yield('head') <!-- Allows child templates to add extra head content -->
</head>
<body>
    @include('components.navbar') {{-- Navbar included once for all pages --}}

    <main class="py-4">
        <div class="container">
            @yield('content') <!-- Child views insert their content here -->
        </div>
    </main>

    {{-- Include the reusable footer --}}
    @include('components.footer')

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    @yield('scripts') <!-- Allows child templates to insert extra scripts -->
</body>
</html>
