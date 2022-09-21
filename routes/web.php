<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;

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


// show
Route::get('/registermy', [RegisterController::class,'show']);

//asignacion de la ruta por metodo post llamando a la clase
Route::post('/registermy', [RegisterController::class,'registermy']);

Route::get('/loginmy', [LoginController::class,'show']);
//asignacion de la ruta por metodo post llamando a la clase
Route::post('/loginmy', [LoginController::class,'authenticate']);

Route::get('/homemy', [HomeController::class,'index']);

Route::get('/logout', [LogoutController::class,'logout']);




//todas las rutas
// Route::name('admin.')->middleware(['auth', 'verified'])->prefix('admin')->group(function () {
//     Route::resources([
//         'users'          => UsersController::class,
//     ]);
// });
require __DIR__.'/auth.php';
