@extends('layouts.adoptante.app')

@section('title', 'Productos')

@section('content')

<section class="adopta-section">

    <h2>Productos</h2>
    <p>Encuentra accesorios o alimento para tu amigo animal 🐾</p>

    <!-- 📦 GRID -->
    <div class="adopta-grid">

        @for ($i = 0; $i < 6; $i++)
        <div class="adopta-card">

            <img src="{{ asset('img/a.png') }}" alt="producto">

            <h3>Producto {{ $i+1 }}</h3>
            <p>Categoría: Accesorio</p>
            <p class="precio">$25,000</p>
            <p class="stock">Stock: 10</p>

            <!-- 🔢 CANTIDAD -->
            <div class="cantidad-box">
                <input type="number" value="1" min="1">
            </div>

            <!-- 🛒 AGREGAR -->
            <button class="btn-agregar">
                Agregar al carrito
            </button>

        </div>
        @endfor

    </div>

</section>

@endsection