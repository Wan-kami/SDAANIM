<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Support\Facades\Auth;

class VoluntarioController extends Controller
{
    public function index()
    {
        $user = Auth::user() ?? (object)[
            'documento' => 123456,
            'name' => 'Voluntario Demo'
        ];

        $documento = $user->documento ?? 0;
        $nombre = $user->name ?? 'Voluntario';

        $tareas = Tarea::where('Usu_documento', $documento)
                        ->orderBy('Tar_fecha_asignacion', 'desc')
                        ->get();

        $total_tareas = $tareas->count();
        $total_completadas = Tarea::where('Usu_documento', $documento)
                                   ->where('Tar_estado', 'Completada')
                                   ->count();

        return view('voluntario.indexvoluntario', compact(
            'tareas', 'total_tareas', 'total_completadas', 'nombre'
        ));
    }
}