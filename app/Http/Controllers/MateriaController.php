<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use App\Models\MateriasCursos;
use App\Models\Examen;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    public function index()
    {
        return view("materias.materias");
    }

    public function all()
    {
        return response()->json(Materia::all());
    }

    public function cursos($id)
    {
        return response()->json(MateriasCursos::where('materia_id', "=", $id)->get());
    }

    public function examenes($id)
    {
        return response()->json(Examen::where('materia_id', "=", $id)->get());
    }

    public function store(Request $request)
    {
        if (empty($request->nombre)) return $this->Error("El nombre de una materia no puede estar vacío.");
        $existe = Materia::where('nombre', $request->nombre);
        if ($existe != null) return $this->Error("La matería ya existe.", $existe);

        $materia = new Materia();
        $materia->nombre = $request->nombre;
        $materia->estado = 1;
        $materia->save();

        return $this->Ok($materia, "La materia se guardó correctamente.");
    }

    public function show($id)
    {
        $materia = Materia::find($id);

        if (!$materia) return $this->Error($materia, self::ERROR_DATABASE, "La materia no existe");
        else return $this->Ok($materia);
    }

    public function destroy($id)
    {
        $materia = Materia::find($id);
        if (!$materia) return $this->Error(null, self::ERROR_DATABASE, "No se encontró la materia.");
    
        $materia->estado = 0;
        $materia->save();

        return $this->Ok($materia, "La materia se eliminó correctamente.");
    }
}
