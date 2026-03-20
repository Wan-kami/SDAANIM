<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tarea;

class VoluntarioController extends Controller
{
    public function index()
    {
        // Usuario autenticado (Laravel)
        $user = Auth::user();

        // Ajusta según tu BD
        $documento = $user->documento ?? 0;
        $nombre = $user->name ?? 'Voluntario';

        // Obtener tareas del usuario
        $tareas = Tarea::where('Usu_documento', $documento)
            ->orderBy('Tar_fecha_asignacion', 'desc')
            ->get();

        // Totales
        $total_tareas = $tareas->count();

        $total_completadas = Tarea::where('Usu_documento', $documento)
            ->where('Tar_estado', 'Completada')
            ->count();

        // Enviar datos a la vista
        return view('voluntario.indexvoluntario', compact(
            'tareas',
            'total_tareas',
            'total_completadas',
            'nombre'
        ));
    }
}