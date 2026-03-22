@extends('layouts.adoptante.app')

@section('title', 'Quiénes Somos')

@section('content')
<link rel="stylesheet" href="{{ asset('css/adoptante/Historia.css') }}">

<main class="quienes-somos">

    <section class="banner-quienes">
        <h2>Quiénes Somos</h2>
        <p>
            Conoce nuestra misión, visión y valores como fundación dedicada al bienestar animal 🐾
        </p>
    </section>

    <section class="seccion">
        <h3>🐶 Nuestra Misión</h3>
        <p>{!! nl2br(e($data['mision'])) !!}</p>
    </section>

    <section class="seccion">
        <h3>🌟 Nuestra Visión</h3>
        <p>{!! nl2br(e($data['vision'])) !!}</p>
    </section>

    <section class="seccion valores">
        <h3>💡 Nuestros Valores</h3>
        <ul>
            @foreach ($data['valores'] as $valor)
                <li>{{ trim($valor) }}</li>
            @endforeach
        </ul>
    </section>

</main>

@endsection