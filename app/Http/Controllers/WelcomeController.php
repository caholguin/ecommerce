<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Orden;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        if (auth()->user()) {
            
            $pendiente = Orden::where('estado',1)->where('user_id', auth()->user()->id)->count();

            if ($pendiente) {

                $mensaje = "<i class='fa-solid fa-circle-check'></i> Usted Tiene $pendiente ordenes pendientes. <a href='". route('ordenes.index') . "?estado=1'>Ir a pagar</a>";

                session()->flash('flash.banner', $mensaje);            
            }

        }


        $categorias = Categoria::all();

        return view('welcome',compact('categorias'));
    }
}
