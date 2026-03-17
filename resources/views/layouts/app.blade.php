<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <!-- HEADER -->
    <header class="main-header">
        <div class="header-top">

            <!-- LOGO -->
            <div class="logo">
                <img src="{{ asset('img/a.png') }}" alt="logo">
                <span>Esperanza Animal BQ</span>
            </div>

            <!-- MENÚ -->
            <nav class="nav-menu">
                <a href="/">Inicio</a>
                <a href="/historia">Quienes somos</a>
                <a href="/adopta">Adopta</a>
                <a href="/productos">Productos</a>
                <a href="/dona">Dona</a>
                <a href="/solicitudes">Solicitudes</a>

                <!-- Dropdown -->
                <div class="dropdown">
                    <a href="#" class="dropbtn">Apóyanos ▾</a>
                    <div class="dropdown-content">
                        <a href="/voluntario">Voluntario</a>
                        <a href="/veterinario">Veterinario</a>
                    </div>
                </div>
            </nav>

            <!-- USUARIO -->
            <div class="search-container">

                <nav class="nav-right">
                    @if(session('nombre'))
                    <span class="usuario-nombre">{{ session('nombre') }}</span>
                    @else
                    <button onclick="window.location.href='/login'" class="filtro">Iniciar Sesión</button>
                    <button onclick="window.location.href='/registro'" class="filtro">Registrarse</button>
                    @endif
                </nav>

                <div class="usuario">
                    <a href="/perfil">
                        <img src="{{ asset('img/usuario.png') }}" alt="Usuario" id="usuario-icon">
                    </a>
                </div>

            </div>
        </div>
    </header>

    <!-- CONTENIDO DINÁMICO -->
    <main>
        @yield('content')
    </main>

</body>

</html>