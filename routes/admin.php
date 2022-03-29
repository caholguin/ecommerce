<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Admin\MostrarProductos;
use App\Http\Livewire\Admin\CrearProducto;
use App\Http\Livewire\Admin\EditarProducto;

Route::get('/', MostrarProductos::class)->name('admin.index');

Route::get('productos/create', CrearProducto::class)->name('admin.productos.create');

Route::get('productos/{producto}/edit', EditarProducto::class)->name('admin.productos.edit');
