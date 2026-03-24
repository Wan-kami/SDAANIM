@extends('layouts.voluntario.app')

@section('title', 'Panel de Voluntario')

@section('content')

<!-- SIDEBAR -->

<section class="admin-sections">

    <div class="admin-card">
        <div class="icon">📝</div>
        <h3>Tareas Asignadas</h3>
        <p>
            Total: {{ $total_tareas }} |
            Completadas: {{ $total_completadas }}
        </p>
        <a href="{{ url('/tareas') }}">Ver Tareas</a>
    </div>

    <div class="admin-card">
        <div class="icon">📅</div>
        <h3>Calendario</h3>
        <p>Revisa tus fechas límite y organiza tu agenda</p>
        <a href="{{ url('/indexvoluntario/calendario') }}">Ver Calendario</a>
    </div>

    <div class="admin-card">
        <div class="icon">📊</div>
        <h3>📊 Historial</h3>
        <p>Consulta tus actividades completadas y progreso</p>
        <a href="{{ url('/indexvoluntario/historial') }}">Ver Historial</a>
    </div>

</section>

<script>
function toggleSidebar(){
    document.getElementById('notifSidebar').classList.toggle('active');
}
</script>

@endsection