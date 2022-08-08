<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\ArchivoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TipoDocumentoController;
use App\Models\User;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('roles/create', [UserController::class, 'createRoles']);
Route::get('roles/assign/{id}/{role}', [UserController::class, 'asignRol']);

Route::group(['middleware' => ['role:'.User::ROL_ADMIN]], function () {
    Route::resource('departamentos', DepartamentoController::class)->middleware(['auth']);
    Route::resource('tipo-documento', TipoDocumentoController::class)->middleware(['auth']);
    Route::resource('users', UserController::class)->middleware(['auth']);
});

Route::group(['middleware' => ['role:'.User::ROL_ADMIN.'|'.User::ROL_JEFE_ACADEMICO.'|'.User::ROL_CORDINADOR_CARRERA.'|'.User::ROL_DOCENTE]], function () {
    Route::resource('archivos', ArchivoController::class)->middleware(['auth']);
    Route::get('archivos/pagina/{id}', [ArchivoController::class, 'pagina'])->middleware(['auth']);
});


require __DIR__.'/auth.php';
