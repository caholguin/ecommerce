<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Producto;

use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    public function files(Producto $producto, Request $request)
    {
       $url = Storage::put('productos',$request->file('file'));

        $request->validate([
            'file' => 'required|image|max:2048'
        ]);

        $producto->imagenes()->create([
            'url' => $url
        ]);
    }
}
