<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfesionalController;//Incluir el método categoria Controller

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
    return view('contenido');
});

// Route::get('/prueba', function () {
//     return view('principal');
// });

Route::get('/profesional', [ProfesionalController::class,'index']);
Route::post('/profesional/registrar', [ProfesionalController::class,'store']);//Registrar profesional
Route::put('/profesional/actualizar', [ProfesionalController::class,'update']);//actualizar profesional
Route::put('/profesional/desactivar', [ProfesionalController::class,'desactivar']);//desactivar profesional
Route::put('/profesional/activar', [ProfesionalController::class,'activar']);//activar profesional