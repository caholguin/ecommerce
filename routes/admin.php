<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Admin\MostrarProductos;
use App\Http\Livewire\Admin\CrearProducto;
use App\Http\Livewire\Admin\EditarProducto;
use App\Http\Controllers\Admin\ProductoController;

Route::get('/', MostrarProductos::class)->name('admin.index');

Route::get('productos/create', CrearProducto::class)->name('admin.productos.create');

Route::get('productos/{producto}/edit', EditarProducto::class)->name('admin.productos.edit');

Route::post('productos/{producto}/files', [ProductoController::class, 'files'])->name('admin.productos.files');