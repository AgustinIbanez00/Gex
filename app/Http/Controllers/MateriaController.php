<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materias = Materia::all();

    	return view("materias.materias",  $materias);
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
        if(empty($request->nombre)) return response()->json([
            'data' => $curso,
            'error' => 'Es requerido el nombre de la materia.'
        ]);

        $materia = new Materia();
        $materia->nombre = $request->nombre;
        $materia->estado = 1;
        $materia->save();
        
        return response()->json([
            'data' => $materia,
            'error' => null
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function show(Materia $materia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function edit(Materia $materia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Materia $materia)
    {
        if(empty($request->nombre)) return response()->json([
            'data' => $curso,
            'error' => 'Es requerido el nombre de la materia.'
        ]);

        if(!is_numeric($request->estado)) return response()->json([
            'data' => $curso,
            'error' => 'El estado debe ser un valor entre 0 y 1.'
        ]);

        if($request->estado > 1 || $request->estado < 0) return response()->json([
            'data' => $materia,
            'error' => 'El estado debe ser un valor entre 0 y 1.'
        ]);


        $materia->nombre = $request->nombre;
        $materia->estado = $request->estado;

        return response()->json([
            'data' => $materia,
            'error' => null
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Materia $materia)
    {
        if(!isset($materia)) return response()->json([
            'data' => $materia,
            'error' => 'No se seleccionó una materia para eliminar.'
        ]);

        $materia->delete();

        return response()->json([
            'data' => $materia,
            'error' => null
        ]);
    }
}
