<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TareaController extends Controller
{
    public function index()
    {
        $user = Auth::user() ?? (object)[
            'documento' => 123456,
            'name' => 'Voluntario Demo'
        ];

        $nombre = $user->name ?? 'Voluntario';
        $tareas = Tarea::where('Usu_documento', $user->documento)
                        ->orderBy('Tar_fecha_asignacion', 'desc')
                        ->get();
        $msg = session('msg');

        return view('voluntario.tarea', compact('tareas', 'nombre', 'msg'));
    }

    public function actualizar($id, $accion)
    {
        $tarea = Tarea::findOrFail($id);

        if ($accion === 'enprogreso') {
            $tarea->Tar_estado = 'En progreso';
        } elseif ($accion === 'completada') {
            $tarea->Tar_estado = 'Completada';
        }

        $tarea->save();

        return redirect()->back()->with('msg', 'Tarea actualizada correctamente.');
    }

    public function comentar(Request $request)
    {
        $request->validate([
            'tar_id' => 'required|exists:tarea,Tar_id',
            'comentario' => 'required|string'
        ]);

        $tarea = Tarea::findOrFail($request->tar_id);
        $tarea->Tar_comentario = $request->comentario;
        $tarea->save();

        return redirect()->back()->with('msg', 'Comentario guardado correctamente.');
    }

    public function editarComentario(Request $request)
    {
        $request->validate([
            'tar_id' => 'required|exists:tarea,Tar_id',
            'comentario' => 'required|string'
        ]);

        // Buscar la tarea
        $tarea = Tarea::findOrFail($request->tar_id);

        // Actualizar el comentario
        $tarea->Tar_comentario = $request->comentario;
        $tarea->save();

        return redirect()->back()->with('msg', 'Comentario actualizado correctamente.');
    }
}