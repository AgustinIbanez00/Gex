<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use Error;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    public function index()
    {
    	return view("materias.materias");
    }

    public function store(Request $request)
    {
        if(empty($request->nombre)) return response()->json([
            'data' => null,
            'error' => 'Es requerido el nombre de la materia.'
        ]);

        if(Materia::where('nombre', $request->nombre) != null) {
            return response()->json([
                'data' => null,
                'error' => "",
                'mensaje' => "La materia ya existe."
            ]);
        }

        $materia = new Materia();
        $materia->nombre = $request->nombre;
        $materia->estado = 1;
        $materia->save();
        
        return response()->json([
            'data' => $materia,
            'error' => null
        ]);
    }

    public function show($id)
    {
        $materia = Materia::find($id);

        if(!isset($materia)) return $this->Error($materia, self::ERROR_DATABASE, "La materia no existe");
        else return $this->Ok($materia);
    }

    public function destroy(Materia $materia)
    {
        if(!isset($materia)) $this->Error(null, self::ERROR_DATABASE, "No se encontró la materia.");

        $materia->delete();

        $this->Ok($materia, "La materia se eliminó correctamente.");
    }
}
