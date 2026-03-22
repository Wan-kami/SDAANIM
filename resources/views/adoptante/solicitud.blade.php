@extends('layouts.adoptante.app')

@section('title', 'Solicitudes')

@section('content')
<link rel="stylesheet" href="{{ asset('css/adoptante/solicitud.css') }}">

<div class="solicitudes-container">

    <h2>Mis solicitudes de adopción</h2>

    <div class="solicitudes-grid">

        @for ($i = 1; $i <= 4; $i++)

        <div class="solicitud-card">

            <!-- 🐾 IMAGEN -->
            <img src="{{ asset('img/a.png') }}" alt="Mascota">

            <!-- 📄 CONTENIDO -->
            <div class="solicitud-body">

                <h3>Mascota {{ $i }}</h3>

                <!-- 🔖 ESTADO -->
                <span class="estado estado-pendiente">
                    Pendiente
                </span>

                <!-- 📅 INFO EXTRA -->
                <p class="fecha">Fecha: 2026-01-01</p>

                <!-- 🔘 BOTÓN -->
                <button class="btn-detalle">
                    Ver detalles
                </button>

            </div>

        </div>

        @endfor

    </div>

</div>

@endsection