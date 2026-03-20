

<header class="admin-header">
    <div class="logo">
        <img src="{{ asset('img/a.png') }}" alt="Logo">
        <h2>Panel Voluntario</h2>
    </div>

    <div>
        <button onclick="toggleSidebar()">🔔 Notificaciones</button>

        <span style="margin-left:15px;font-weight:bold;">
            {{ $nombre }}
        </span>

       {{-- 
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit">Cerrar sesión</button>
            </form>
        --}}

        <button type="button" onclick="alert('Aún no hay sistema de login')">
            Cerrar sesión
        </button>
    </div>

</header>