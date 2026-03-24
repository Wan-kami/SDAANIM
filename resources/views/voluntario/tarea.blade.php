@extends('layouts.voluntario.app')

@section('title', 'Panel de Voluntario')

@section('content')

<main>
    @if($msg)
        <div class="msg">{{ $msg }}</div>
    @endif

    <h3>Tareas Asignadas</h3>

    @if($tareas->count())
        <table class="tareas-table">
            <tr>
                <th>Título</th>
                <th>Descripción</th>
                <th>Fecha Asignación</th>
                <th>Fecha Límite</th>
                <th>Estado</th>
            </tr>
            @foreach($tareas as $tarea)
            <tr>
                <td>{{ $tarea->Tar_titulo }}</td>
                <td>{{ $tarea->Tar_descripcion }}</td>
                <td>{{ $tarea->Tar_fecha_asignacion }}</td>
                <td>{{ $tarea->Tar_fecha_limite }}</td>
                <td class="@if($tarea->Tar_estado=='Pendiente') estado-pendiente
                           @elseif($tarea->Tar_estado=='En progreso') estado-enprogreso
                           @else estado-completada @endif">

                    {{ $tarea->Tar_estado }}

                    {{-- Botones de actualización --}}
                    @if($tarea->Tar_estado=='Pendiente')
                        <a href="{{ route('tarea.actualizar', [$tarea->Tar_id, 'enprogreso']) }}" class="fancy-btn">➡ En progreso</a>
                    @elseif($tarea->Tar_estado=='En progreso')
                        <a href="{{ route('tarea.actualizar', [$tarea->Tar_id, 'completada']) }}" class="fancy-btn">✔ Completar</a>
                    @endif

                    {{-- Formulario de comentario --}}
                    @if($tarea->Tar_estado=='Completada')
                        @if(empty($tarea->Tar_comentario))
                            {{-- No hay comentario: mostrar textarea directamente --}}
                            <form action="{{ route('tarea.comentar') }}" method="POST" style="margin-top:5px;">
                                @csrf
                                <input type="hidden" name="tar_id" value="{{ $tarea->Tar_id }}">
                                <textarea name="comentario" placeholder="Deja un comentario sobre la tarea" required style="width:100%;margin-top:5px;"></textarea>
                                <button type="submit" style="margin-top:5px;">Enviar Comentario</button>
                            </form>
                        @else
                            {{-- Hay comentario: mostrar en un cuadro y botón de lápiz --}}
                            <div style="border:1px solid #ccc; padding:8px; border-radius:4px; position:relative;">
                                <p id="comentario-{{ $tarea->Tar_id }}">{{ $tarea->Tar_comentario }}</p>
                                <button type="button" onclick="editarComentario({{ $tarea->Tar_id }})" style="position:absolute; top:5px; right:5px; border:none; background:none; cursor:pointer;">
                                    ✏️
                                </button>
                            </div>

                            {{-- Formulario oculto para editar --}}
                            <form id="form-comentario-{{ $tarea->Tar_id }}" action="{{ route('tarea.comentar') }}" method="POST" style="margin-top:5px; display:none;">
                                @csrf
                                <input type="hidden" name="tar_id" value="{{ $tarea->Tar_id }}">
                                <textarea name="comentario" style="width:100%; margin-top:5px;">{{ $tarea->Tar_comentario }}</textarea>
                                <button type="submit" style="margin-top:5px;">Actualizar Comentario</button>
                                <button type="button" onclick="cancelarEdicion({{ $tarea->Tar_id }})" style="margin-top:5px;">Cancelar</button>
                            </form>
                        @endif
                    @endif

                </td>
            </tr>
            @endforeach
        </table>
    @else
        <p>No tienes tareas asignadas por el momento.</p>
    @endif

    <script>
        function editarComentario(id) {
            document.getElementById(`comentario-${id}`).style.display = 'none';
            document.getElementById(`form-comentario-${id}`).style.display = 'block';
        }

        function cancelarEdicion(id) {
            document.getElementById(`comentario-${id}`).style.display = 'block';
            document.getElementById(`form-comentario-${id}`).style.display = 'none';
        }
        </script>
</main>

@endsection