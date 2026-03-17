<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class AdoptanteController extends Controller
{
    public function index()
    {
        $animales = DB::table('animal')
            ->orderBy('Anim_id', 'desc')
            ->limit(3)
            ->get();

        return view('adoptante.index', compact('animales'));
    }
}
