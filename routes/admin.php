<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Admin\MostrarProductos;
use App\Http\Livewire\Admin\CrearProducto;
use App\Http\Livewire\Admin\EditarProducto;
use App\Http\Controllers\Admin\ProductoController;
use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Livewire\Admin\MostrarCategoria;
use App\Http\Livewire\Admin\MarcaComponent;

Route::get('/', MostrarProductos::class)->name('admin.index');

Route::get('productos/create', CrearProducto::class)->name('admin.productos.create');

Route::get('productos/{producto}/edit', EditarProducto::class)->name('admin.productos.edit');

Route::post('productos/{producto}/files', [ProductoController::class, 'files'])->name('admin.productos.files');

Route::get('categorias',[CategoriaController::class,'index'])->name('admin.categorias.index');

Route::get('categorias/{categoria}', MostrarCategoria::class)->name('admin.categorias.show');

Route::get('marcas', MarcaComponent::class)->name('admin.marcas.index');
    
