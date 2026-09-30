<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Aplikasi Peserta Sertifikasi')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { background-color: #22396F; }
        .sidebar { min-height: 100vh; background: #0D1C42; }
        .sidebar a { color: #cbd5e1; text-decoration: none; padding: .75rem 1rem; display: block; border-radius: 6px; }
        .sidebar a:hover, .sidebar a.active { background: #334155; color: #fff; }
    </style>
</head>
<body>
<div class="d-flex">
    @auth
    <div class="sidebar p-3" style="width: 240px;">
        <h5 class="text-white mb-4">Aplikasi Sertifikasi</h5>
        <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <i class="bi bi-speedometer2"></i> Dashboard
        </a>
        <a href="{{ route('peserta.index') }}" class="{{ request()->routeIs('peserta.*') ? 'active' : '' }}">
            <i class="bi bi-people"></i> Data Peserta
        </a>
        <a href="{{ route('skema.index') }}" class="{{ request()->routeIs('skema.*') ? 'active' : '' }}">
            <i class="bi bi-award"></i> Data Skema
        </a>
        <form action="{{ route('logout') }}" method="POST" class="mt-3">
            @csrf
            <button class="btn btn-danger btn-sm w-100">
                <i class="bi bi-box-arrow-right"></i> Logout
            </button>
        </form>
    </div>
    @endauth

    <div class="flex-grow-1 p-4 content-area">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @yield('content')
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>