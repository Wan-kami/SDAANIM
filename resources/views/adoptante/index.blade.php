
@extends('layouts.app')

@section('title', 'Adopción de Mascotas')

@section('content')

<!-- Banner -->
<div class="banner">
    <h2>¡Encuentra a tu nuevo mejor amigo!</h2>
    <p>Todos los animales de la calle necesitan nuestra protección.
        <br>¡Ayúdanos hoy!
    </p>
</div>

<!-- Recién llegados -->
<div class="section-header">
    <h3>Recién llegados</h3>
    <a href="/adopta">Ver más</a>
</div>

<br>

<div class="adopta-grid">

    @forelse($animales as $animal)

        <div class="adopta-card">
            <img src="{{ asset('img/' . $animal->Anim_foto) }}" alt="{{ $animal->Anim_nombre }}">
            <h3>{{ $animal->Anim_nombre }}</h3>
            <p>Raza: {{ $animal->Anim_raza }}</p>
            <p>Edad: {{ $animal->Anim_edad }}</p>

            <button onclick="window.location.href='/formAdop/{{ $animal->Anim_id }}'">
                Adóptame
            </button>
        </div>

    @empty
        <p style="text-align:center;">No hay animales registrados aún 🐾</p>
    @endforelse

</div>

@endsection