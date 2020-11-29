<?php

namespace App\Http\Controllers;

use App\Models\MateriasCursos;
use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Materia;


class MateriasCursoController extends Controller
{


    // GET CURSOS
    public function show($cursoId)
    {
        return response()->json(['cursoId' => $cursoId ]);
    }

}
