<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CursoController;
use App\Http\Controllers\ExamenController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\MateriaCursoController;
use App\Http\Controllers\MesaController;
use App\Http\Controllers\MesasAlumnosController;
use App\Http\Controllers\PreguntaController;
use App\Http\Controllers\RespuestaController;
use App\Http\Controllers\RespuestasAlumnosController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth:sanctum', 'verified'])->get('/home', function () {
    return view('home');
})->name('home');

Route::resource('cursos', CursoController::class)->only([
    'index', 'show' 
])->middleware('auth');

Route::resource('examenes', ExamenController::class)->middleware('auth');

Route::resource('materias', MateriaController::class)->middleware('auth');

Route::resource('materiasCursos', MateriaCursoController::class)->middleware('auth');

Route::resource('mesas', MesaController::class)->middleware('auth');

Route::resource('mesasAlumnos', MesasAlumnosController::class)->middleware('auth');

Route::resource('preguntas', PreguntaController::class)->middleware('auth');

Route::resource('respuestas', RespuestaController::class)->middleware('auth');

Route::resource('respuestaAlumnos', RespuestasAlumnosController::class)->middleware('auth');



