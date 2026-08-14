<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videoclub</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

   <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand font-weight-bold" href="{{ url('/catalog') }}">🎬 Videoclub</a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                
                {{-- MENÚ IZQUIERDO: OPCIONES DEL ENUNCIADO --}}
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('catalog') ? 'active' : '' }}" href="{{ url('/catalog') }}">📋 Catálogo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('catalog/create') ? 'active' : '' }}" href="{{ url('/catalog/create') }}">➕ Añadir película</a>
                    </li>
                </ul>

                {{-- MENÚ DERECHO: AUTENTICACIÓN Y CIERRE DE SESIÓN LIMPIO --}}
                <ul class="navbar-nav ms-auto">
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item">
                                <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                                    @csrf
                                    <button type="submit" class="btn nav-link text-danger font-weight-bold" style="background: none; border: none;">
                                        ❌ Cerrar Sesión
                                    </button>
                                </form>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">🔑 Iniciar Sesión</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">📝 Registrarse</a>
                                </li>
                            @endif
                        @endauth
                    @endif
                </ul>

            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>