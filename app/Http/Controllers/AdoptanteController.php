<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Animal;

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
    public function quienes()
    {
        $ruta = public_path('json/quienes.json');

        if (!file_exists($ruta)) {
            dd("No existe el archivo 😢");
        }

        $json = file_get_contents($ruta);
        $data = json_decode($json, true);

        if (!$data) {
            dd("JSON mal formado 💀");
        }

        return view('adoptante.quienes', compact('data'));
    }
    public function adopta(Request $request)
    {
        $filtro = $request->get('filtro', 'todos');

        $query = Animal::query();

        $query->selectRaw("
        *,
        CASE 
            WHEN Anim_tipo_edad = 'años' THEN Anim_edad * 12
            ELSE Anim_edad
        END as edad_meses
    ");

        if ($filtro == "cachorros") {
            $query->having('edad_meses', '<=', 12);
        } elseif ($filtro == "jovenes") {
            $query->havingBetween('edad_meses', [13, 60]);
        } elseif ($filtro == "mayores") {
            $query->having('edad_meses', '>', 60);
        }

        $animales = $query->orderBy('Anim_id', 'desc')->get();

        return view('adoptante.adopta', compact('animales', 'filtro'));
    }
}
