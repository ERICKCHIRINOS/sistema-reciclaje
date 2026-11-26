<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    @endif
</head>
<body class="bg-light text-dark min-vh-100 d-flex flex-column">
    <header class="border-bottom bg-white">
        <div class="container py-3 d-flex justify-content-between align-items-center">
            <a href="{{ url('/') }}" class="fw-semibold text-decoration-none text-dark">
                {{ config('app.name', 'Laravel') }}
            </a>

            @if (Route::has('login'))
                <nav class="d-flex align-items-center gap-2">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-sm btn-outline-dark">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-sm btn-link text-dark text-decoration-none">
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-sm btn-success">
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </div>
    </header>

    <main class="container flex-grow-1 d-flex align-items-center justify-content-center py-5">
        <div class="col-12 col-md-8 col-lg-6">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4 p-md-5">
                    <h1 class="h3 fw-semibold mb-2">Let's get started</h1>
                    <p class="text-muted mb-4">
                        Base de vistas lista con Bootstrap 5. Ya puedes iniciar sesión o registrarte.
                    </p>

                    <div class="d-flex flex-wrap gap-2">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="btn btn-success">
                                Ir al Dashboard
                            </a>
                        @else
                            @if (Route::has('login'))
                                <a href="{{ route('login') }}" class="btn btn-success">
                                    Log in
                                </a>
                            @endif
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-outline-secondary">
                                    Register
                                </a>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>