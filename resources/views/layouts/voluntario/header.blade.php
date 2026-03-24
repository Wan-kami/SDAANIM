<header class="admin-header">
    <div class="logo">
        <img src="{{ asset('img/a.png') }}" alt="Logo">
        <h2>Panel Voluntario</h2>
    </div>

    <div>
        <button onclick="toggleSidebar()">🔔 Notificaciones</button>
        <div id="notifSidebar" class="notif-sidebar">
            <button onclick="toggleSidebar()">✖</button>
            <h3>Notificaciones</h3>

            <div class="sidebar-links">
                <a href="{{ url('/indexvoluntario') }}">🏠 Inicio</a>
                <a href="{{ url('/tareas') }}">📝 Mis Tareas</a>
                <a href="{{ url('/indexvoluntario/historial') }}">📊 Historial</a>
                <a href="{{ url('/indexvoluntario/perfil') }}">👤 Mi Perfil</a>
            </div>
        </div>

        <span style="margin-left:15px;font-weight:bold;">
            {{ $nombre }}
        </span>

        {{-- Formulario oculto de logout --}}
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
            @csrf
        </form>

        {{-- Botón de logout --}}
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="margin-left:10px;">
            Cerrar sesión
        </a>
    </div>
</header>

<script>
function toggleSidebar(){
    document.getElementById('notifSidebar').classList.toggle('active');
}
</script>