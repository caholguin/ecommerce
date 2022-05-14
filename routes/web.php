<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\OrdenController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ProductoController;
use App\Http\Livewire\CarritoCompras;
use App\Http\Livewire\CrearOrden;
use App\Http\Livewire\PagoOrden;
use App\Models\Orden;
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

/* route::get('prueba1',function(){
    \Cart::destroy();
 });
 */
Route::get('carrito-compras', CarritoCompras::class)->name('carrito-compras');


Route::middleware(['auth'])->group(function(){

    Route::get('ordenes/create',CrearOrden::class)->name('ordenes.create');

    Route::get('ordenes/{orden}/pago',PagoOrden::class)->name('ordenes.pago');

    Route::get('ordenes/{orden}', [OrdenController::class, 'show'])->name('ordenes.show');

    Route::get('ordenes', [OrdenController::class,'index'])->name('ordenes.index');

});

// Route::get('ordenes/{orden}/pago',[OrdenController::class,'pago'])->name('ordenes.pago');


/* Route::get('prueba',function (){

   

   return "se formateo con exito"; 

   //return cantidad(11, $color_id=2, $talla_id = 1);
}); */