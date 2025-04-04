<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Laravel')) - Aplikasi Absensi</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Bootstrap (tambahan dari template pertama) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <!-- Navbar (tambahan dari template pertama) -->
    <nav class="navbar navbar-dark bg-dark p-3">
        <a href="{{ url('/') }}" class="navbar-brand">Aplikasi Absensi</a>
        <div>
            <a href="{{ route('absensi.index') }}" class="btn btn-outline-light">Absensi</a>
            <a href="{{ route('izin.index') }}" class="btn btn-outline-light">Izin & Cuti</a>

            <a href="{{ route('admin.users') }}"class="btn btn-outline-light">Kelola Pengguna</a>
            
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>

        </div>
    </nav>

    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endisset

        <!-- Page Content -->
        <main class="container mt-4">
            @yield('content')
        </main>

    </div>

    <!-- Bootstrap JS (tambahan dari template pertama) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
