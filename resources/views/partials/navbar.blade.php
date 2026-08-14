<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}" style="color:#777"><span style="font-size:15pt">&#128253;</span> Videoclub</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            {{-- EL MENÚ SOLO APARECE SI EL USUARIO ESTÁ AUTENTICADO --}}
            @auth
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('catalog') ? 'active' : '' }}" href="{{ url('/catalog') }}">
                            &#128214; Catálogo
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('catalog/create') ? 'active' : '' }}" href="{{ url('/catalog/create') }}">
                            &#10133; Añadir película
                        </a>
                    </li>
                </ul>

                {{-- BLOQUE DE CIERRE DE SESIÓN (LADO DERECHO) --}}
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}" id="logout-form" class="d-none">
                            @csrf
                        </form>
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="color: #ff6b6b; font-weight: bold;">
                            &#128682; Cerrar sesión
                        </a>
                    </li>
                </ul>
            @endauth

            {{-- SI NO ESTÁ LOGUEADO, MUESTRA EL MENÚ DE LOGIN --}}
            @guest
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/login') }}">Iniciar Sesión</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/register') }}">Registrarse</a>
                    </li>
                </ul>
            @endguest
        </div>
    </div>
</nav>