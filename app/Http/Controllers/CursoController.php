<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("cursos.cursos");       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date = Carbon::now()->toDateTimeString();

        if($request->fecha > $date){
            return response()->json([
                'data' => $curso,
                'error' => 'La fecha del curso no puede ser mayor a la fecha actual.'
                ]);
        }

        
        if($request->cuatrimestre > 2 || $request->cuatrimestre < 1) {
            return response()->json([
                'data' => $curso,
                'error' => 'El valor del cuatrimestre es inválido.'
            ]);
        }

        if($request->ciclo_lectivo > now()->year){
            return response()->json([
                'data' => $curso,
                'error' => 'El valor del ciclo lectivo es inválido.'
            ]);
        }

        if($request->cant_alumnos <= 0){
            return response()->json([
                'data' => $curso,
                'error' => 'No puede ingresar una cantidad de alumnos negativa.'
            ]);
        }

        $curso = new Curso();
        $curso->comision = $request->$comision;
        $curso->cuatrimestre = $request->cuatrimestre;
        $curso->ciclo_lectivo = $request->ciclo_lectivo;
        $curso->cant_alumnos = $request->cant_alumnos;
        $curso->save();

        return response()->json([
            'data' => $curso,
            'error' => null
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function show(Curso $curso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function edit(Curso $curso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Curso $curso)
    {
        $curso = Curso::find($curso->$id);
        $curso->comision = $request->$comision;
        $curso->cuatrimestre = $request->cuatrimestre;
        $curso->ciclo_lectivo = $request->ciclo_lectivo;
        $curso->cant_alumnos = $request->cant_alumnos;
        $curso->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Curso $curso)
    {
        $curso = Curso::find($curso->$id);
        $curso->delete();
    }
}
