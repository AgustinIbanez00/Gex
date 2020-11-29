<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CursoController extends Controller
{
    public function index()
    {
        return view("cursos.cursos");       
    }

    public function all()
    {
        return response()->json(Curso::all());
    }

    public function store(Request $request)
    {
        $date = Carbon::now();

        if($request->fecha > $date)
            return $this->Error("La fecha del curso no puede ser mayor a la fecha actual.");

        if($request->cuatrimestre > 2 || $request->cuatrimestre < 1) 
            return $this->Error("El valor del cuatrimestre es inválido.");

        if($request->ciclo_lectivo > now()->year)
            return $this->Error("El valor del ciclo lectivo es inválido.");

        if($request->cant_alumnos <= 0)
            return $this->Error("No puede ingresar una cantidad de alumnos negativa.");

        $curso = new Curso();
        $curso->comision = $request->comision;
        $curso->cuatrimestre = $request->cuatrimestre;
        $curso->ciclo_lectivo = $request->ciclo_lectivo;
        $curso->cant_alumnos = $request->cant_alumnos;
        $curso->save();

        return $this->Ok($curso);
    }

    public function show($id)
    {
        
    }

    public function destroy($id)
    {
        //$curso = Curso::find($curso->id);
        
    }
}
