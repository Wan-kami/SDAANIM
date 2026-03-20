@extends('layouts.voluntario.app')

@section('title', 'Panel de Voluntario')

@section('content')

<!-- SIDEBAR -->
<div id="notifSidebar" class="notif-sidebar">
    <button onclick="toggleSidebar()">✖</button>
    <h3>Notificaciones</h3>

    <div class="sidebar-links">
        <a href="{{ url('/voluntario') }}">🏠 Inicio</a>
        <a href="{{ url('/voluntario/tareas') }}">📝 Mis Tareas</a>
        <a href="{{ url('/voluntario/historial') }}">📊 Historial</a>
        <a href="{{ url('/voluntario/perfil') }}">👤 Mi Perfil</a>
    </div>
</div>

<section class="admin-sections">

    <div class="admin-card">
        <div class="icon">📝</div>
        <h3>Tareas Asignadas</h3>
        <p>
            Total: {{ $total_tareas }} |
            Completadas: {{ $total_completadas }}
        </p>
        <a href="{{ url('/voluntario/tareas') }}">Ver Tareas</a>
    </div>

    <div class="admin-card">
        <div class="icon">📅</div>
        <h3>Calendario</h3>
        <p>Revisa tus fechas límite y organiza tu agenda</p>
        <a href="{{ url('/voluntario/calendario') }}">Ver Calendario</a>
    </div>

    <div class="admin-card">
        <div class="icon">📊</div>
        <h3>📊 Historial</h3>
        <p>Consulta tus actividades completadas y progreso</p>
        <a href="{{ url('/voluntario/historial') }}">Ver Historial</a>
    </div>

</section>

<script>
function toggleSidebar(){
    document.getElementById('notifSidebar').classList.toggle('active');
}
</script>

@endsection