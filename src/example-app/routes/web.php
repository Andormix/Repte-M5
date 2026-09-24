<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\PlantillaController;
use App\Http\Controllers\ODSController;
use App\Http\Controllers\LlibresODSController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegistreController;


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

// Rutes cap a la pàgina principal
Route::get('/', HomeController::class);
Route::get('/home', HomeController::class)->name('home');

//Zona Usuari
Route::get('/dashboard', DashboardController::class)->name('dashboard');
Route::get('/registre', RegistreController::class)->name('registre');
Route::post('/registrar', [RegistreController::class, 'registrar'])->name('registrar');


//Rutes pàgina ODS
Route::get('/ODS', ODSController::class)->name('ODS');

// Rutes cap a la pàgina de productes
Route::get('/productes', ProductesController::class)->name('productes');
Route::get('/filtrar-libros', [ProductesController::class, 'filtrarLibros'])->name('filtrar-libros');

// Cistella de compres
Route::post('/agregar-al-carrito/{id}', [CarritoController::class, 'afegirProducte'])->name('agregar-al-carrito');
Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminarProducte'])->name('carrito.eliminar');
Route::delete('/carrito/buidar', [CarritoController::class, 'buidar'])->name('carrito.buidar');
Route::delete('/carrito/pagar', [CarritoController::class, 'pagarCarrito'])->name('carrito.pagar');
Route::post('/carrito/editar-cantidad/{id}', [CarritoController::class, 'editarCantidad'])->name('carrito.editar-cantidad');


// Rutes per a la autentificació
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout',  [AuthController::class, 'logout'])->name('logout');
