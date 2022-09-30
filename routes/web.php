<?php

use App\Http\Controllers\ArticuloController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticuloUserController;
use App\Models\Articulo;

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
Route::get('/registermy', [RegisterController::class, 'show']);
//asignacion de la ruta por metodo post llamando a la clase
Route::post('/registermy', [RegisterController::class, 'registermy']);
Route::get('/loginmy', [LoginController::class, 'show']);
//asignacion de la ruta por metodo post llamando a la clase
Route::post('/loginmy', [LoginController::class, 'authenticate']);
Route::get('/homemy', [ArticuloController::class, 'index']);
Route::get('/logout', [LogoutController::class, 'logout']);

Route::resource('articulos', 'App\Http\Controllers\ArticuloController');

// Route::resource('articulosuser', 'App\Http\Controllers\ArticuloUserController');

Route::resource('usuarios', 'App\Http\Controllers\RegisterController');

Route::get('/admin', [AdminController::class, 'index'])
    ->middleware('auth.admin')
    ->name('admin.index');

// Route::get('user-list-excel', 'RegisterController@exportExcel')->name('register.excel');

Route::get('/user-list-excel', [RegisterController::class, 'exportExcel'])->name('register.excel');

Route::get('/article-list-excel', [ArticuloController::class, 'exportExcel'])->name('articulo.excel');

//todas las rutas
// Route::name('admin.')->middleware(['auth', 'verified'])->prefix('admin')->group(function () {
//     Route::resources([
//         'users'          => UsersController::class,
//     ]);
// });
require __DIR__ . '/auth.php';
