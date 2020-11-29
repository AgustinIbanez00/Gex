<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MateriaController;
use App\Http\Controllers\CursoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/materias', [MateriaController::class, 'all']);
Route::get('/materias/{id}', [MateriaController::class, 'show']);
Route::get('/materias/{id}/cursos', [MateriaController::class, 'cursos']);
Route::get('/materias/{id}/examenes', [MateriaController::class, 'examenes']);


Route::get('/cursos', [CursoController::class, 'all']);
Route::get('/cursos/{id}', [CursoController::class, 'show']);

