@extends('layouts.app')

@section('title', 'Panel Voluntario')

@section('content')

<!-- Banner -->
<div class="banner" style="text-align:center;padding:30px;background:#4a90e2;color:white;">
    <h2>🐾 Panel Voluntario</h2>
    <p>Bienvenido {{ $nombre }} <br>
        Gracias por ayudar a los animales 💙
    </p>
</div>

<br>

<!-- Resumen -->
<div style="text-align:center;">
    <h3>Resumen de tus actividades</h3>
</div>

<br>

<!-- Tarjetas -->
<div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(260px,1fr));gap:25px;padding:0 20px;">

    <!-- Tareas -->
    <div class="card" style="background:white;padding:25px;border-radius:12px;text-align:center;">
        <h3>📝 Tareas Asignadas</h3>
        <p>Total: {{ $total_tareas }}</p>
        <p>Completadas: {{ $total_completadas }}</p>

        <br>

        <a href="/tareas" style="background:#007acc;color:white;padding:10px 20px;border-radius:6px;text-decoration:none;">
            Ver tareas
        </a>
    </div>

    <!-- Calendario -->
    <div class="card" style="background:white;padding:25px;border-radius:12px;text-align:center;">
        <h3>📅 Calendario</h3>
        <p>Organiza tus actividades</p>

        <br>

        <a href="/calendario" style="background:#007acc;color:white;padding:10px 20px;border-radius:6px;text-decoration:none;">
            Ver calendario
        </a>
    </div>

    <!-- Historial -->
    <div class="card" style="background:white;padding:25px;border-radius:12px;text-align:center;">
        <h3>📊 Historial</h3>
        <p>Revisa tu progreso</p>

        <br>

        <a href="/historial" style="background:#007acc;color:white;padding:10px 20px;border-radius:6px;text-decoration:none;">
            Ver historial
        </a>
    </div>

</div>

@endsection