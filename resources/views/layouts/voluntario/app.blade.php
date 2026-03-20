<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    {{-- HEADER --}}
    @include('layouts.voluntario.header')

    {{-- CONTENIDO --}}
    <main>
        @yield('content')
    </main>

    {{-- FOOTER --}}
    @include('layouts.voluntario.footer')

</body>
</html>