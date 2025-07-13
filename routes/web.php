<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoodleController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/moodle/cursos', [MoodleController::class, 'cursos']);
Route::get('/moodle/mis-cursos', [MoodleController::class, 'misCursos']);
Route::get('/moodle/categorias', [MoodleController::class, 'categorias']);
Route::get('/moodle/usuarios', [MoodleController::class, 'buscarUsuarios']);
