<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPX Express</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.8-dist/css/bootstrap.min.css') }}">
    <style>
        :root {
            --spx: #FF6B00;
            --spx-dark: #E05A00;
        }
        body { font-family: 'Segoe UI', sans-serif; }

        .navbar                          { background-color: var(--spx) !important; }
        .navbar-brand, .nav-link         { color: white !important; }
        .nav-link:hover                  { color: #ffe0c2 !important; }
        .nav-link.active                 { font-weight: bold; border-bottom: 2px solid white; }

        .btn-primary                     { background-color: var(--spx) !important; border-color: var(--spx) !important; color: white !important; }
        .btn-primary:hover               { background-color: var(--spx-dark) !important; border-color: var(--spx-dark) !important; }
        .btn-outline-light:hover         { background-color: white !important; color: var(--spx) !important; }

        .bg-primary                      { background-color: var(--spx) !important; }
        .bg-spx                          { background-color: var(--spx) !important; }

        .text-primary                    { color: var(--spx) !important; }

        .border-primary                  { border-color: var(--spx) !important; }

        .badge.bg-primary                { background-color: var(--spx) !important; }

        footer                           { background-color: var(--spx) !important; }

        .form-control:focus,
        .form-select:focus               { border-color: var(--spx) !important; box-shadow: 0 0 0 0.2rem rgba(255,107,0,.25) !important; }

        .border-top.border-4            { border-color: var(--spx) !important; }

        .hero-section                    { background-color: var(--spx) !important; }
    </style>
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg px-4 shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold fs-4" href="{{ route('home') }}">🚚 SPX Express</a>
            <button class="navbar-toggler border-white" type="button"
                    data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto gap-1 align-items-center">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('services') ? 'active' : '' }}" href="{{ route('services') }}">Layanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('tracking') ? 'active' : '' }}" href="{{ route('tracking') }}">Tracking</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('tarif') ? 'active' : '' }}" href="{{ route('tarif') }}">Cek Tarif</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link {{ request()->routeIs('news') ? 'active' : '' }}" href="{{ route('news') }}">Berita</a>
                    </li>

                    @auth
                        <li class="nav-item">
                            <a class="nav-link btn btn-outline-light btn-sm text-white px-3 me-2 {{ request()->routeIs('admin.dashboard') ? 'fw-bold' : '' }}" href="{{ route('admin.dashboard') }}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm px-3 text-white border-0" onclick="return confirm('Yakin ingin keluar?')">Logout</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="btn btn-outline-light btn-sm px-3 text-white" href="{{ route('login') }}">Login Admin</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <main class="container py-5">
        @yield('content')
    </main>

    <footer class="text-white text-center py-4 mt-3">
        <p class="mb-0">© 2026 SPX Express. All rights reserved. </p>
    </footer>

    <script src="{{ asset('bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>