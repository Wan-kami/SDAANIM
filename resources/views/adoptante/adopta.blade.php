@extends('layouts.app')

@section('title', 'Adopta')

@section('content')
<main>
    <section id="adopta" class="adopta-section">
        <h2>Adopta</h2>
        <p>Encuentra a tu nuevo mejor amigo 🐾</p>

        <!-- FILTROS -->
        <div class="adopta-filtros">

            <button
                class="filtro {{ $filtro == 'todos' ? 'active' : '' }}"
                onclick="window.location.href='{{ url('/adopta?filtro=todos')}}'">
                Todos
            </button>

            <button
                class="filtro {{ $filtro == 'cachorros' ? 'active' : '' }}"
                onclick="window.location.href='{{ url('/adopta?filtro=cachorros') }}'">
                Cachorros
            </button>

            <button
                class="filtro {{ $filtro == 'jovenes' ? 'active' : '' }}"
                onclick="window.location.href='{{ url('/adopta?filtro=jovenes') }}'">
                Jóvenes
            </button>

            <button
                class="filtro {{ $filtro == 'mayores' ? 'active' : '' }}"
                onclick="window.location.href='{{ url('/adopta?filtro=mayores') }}'">
                Mayores
            </button>

        </div>

        <!-- TARJETAS -->
        <div class="adopta-grid">

            @forelse($animales as $animal)

            <div class="adopta-card">
                <img src="{{ asset('img/' . $animal->Anim_foto) }}">
                <h3>{{ $animal->Anim_nombre }}</h3>
                <p>Raza: {{ $animal->Anim_raza }}</p>
                <p>
                    Edad:
                    {{ $animal->Anim_edad }}
                    {{ $animal->Anim_tipo_edad }}
                </p>

                <a href="/formAdop/{{ $animal->Anim_id }}">
                    <button>Adóptame</button>
                </a>
            </div>

            @empty
            <p>No hay animales registrados aún 🐾</p>
            @endforelse

        </div>
    </section>
</main>
@endsection