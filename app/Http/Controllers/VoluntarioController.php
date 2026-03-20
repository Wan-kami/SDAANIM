<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;
use Illuminate\Support\Facades\Session;

class VoluntarioController extends Controller
{
    public function indexvoluntario()
    {
        $nombre = Session::get('nombre', 'Voluntario');

        $total_tareas = 0;
        $total_completadas = 0;

        return view('voluntario.indexvoluntario', compact(
            'nombre',
            'total_tareas',
            'total_completadas'
        ));
    }
}