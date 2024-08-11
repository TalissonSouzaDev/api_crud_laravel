<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ERSistemasCrudController;

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

Route::get('/teste', function () {
    return view('pages/teste/index');
});


/**
 * Pagina Home
 */
 Route::get('/home', [ERSistemasCrudController::class , 'index'])->name('home');
 Route::post("/create",[ERSistemasCrudController::class,"create"])->name('create');
