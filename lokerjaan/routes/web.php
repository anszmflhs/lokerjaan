<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PekerjaanController;
use App\Http\Controllers\PelamarController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\WawancaraController;
use App\Models\Pelamar;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/pelamar', function() {
//     return view('pelamar.index', [
//         'title' => 'Post Pelamar',
//         'active' => 'pelamar',
//         'pelamar' => Pelamar::all()
        //Kalo semisal menggunakan load itu namanya eager loading untuk meringankan query supaya tidak lag dari N + 1 Problems
//     ]);
// });
Route::prefix('pekerjaan')->group(function () {
    Route::get('/', [PekerjaanController::class, 'index']);
    Route::get('/create', [PekerjaanController::class, 'create']);
    Route::post('/', [PekerjaanController::class, 'store']);
    Route::get('/{id}', [PekerjaanController::class, 'edit']);
    Route::put('/{id}', [PekerjaanController::class, 'update']);
    Route::delete('/{id}', [PekerjaanController::class, 'destroy']);
});
Route::prefix('pelamar')->group(function () {
    Route::get('/', [PelamarController::class, 'index']);
    Route::get('/create', [PelamarController::class, 'create']);
    Route::post('/', [PelamarController::class, 'store']);
    Route::get('/{id}', [PelamarController::class, 'edit']);
    Route::put('/{id}', [PelamarController::class, 'update']);
    Route::delete('/{id}', [PelamarController::class, 'destroy']);
});
Route::prefix('wawancara')->group(function () {
    Route::get('/', [WawancaraController::class, 'index']);
    Route::get('/create', [WawancaraController::class, 'create']);
    Route::post('/', [WawancaraController::class, 'store']);
    Route::get('/{id}', [WawancaraController::class, 'edit']);
    Route::put('/{id}', [WawancaraController::class, 'update']);
    Route::delete('/{id}', [WawancaraController::class, 'destroy']);
});

// Route::get('/wawancara', [WawancaraController::class, 'index']);

Route::post('/register', [RegisterController::class, 'store']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
