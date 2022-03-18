<?php

use App\Http\Controllers\CategoriaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ProductoController;
use App\Http\Livewire\CarritoCompras;
use App\Http\Livewire\CrearOrden;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Routing\Router;

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

Route::get('/', WelcomeController::class);

Route::get('categorias/{categoria}',[CategoriaController::class,'show'])->name('categorias.show');

Route::get('productos/{producto}',[ProductoController::class,'show'])->name('productos.show');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// route::get('prueba',function(){
//     \Cart::destroy();
// });

Route::get('carrito-compras', CarritoCompras::class)->name('carrito-compras');


Route::get('ordenes/create',CrearOrden::class)->middleware('auth')->name('ordenes.create');


