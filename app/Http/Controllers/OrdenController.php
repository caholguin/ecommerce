<?php

namespace App\Http\Controllers;

use App\Models\Orden;
use Illuminate\Http\Request;

class OrdenController extends Controller
{
    public function pago(Orden $orden)
    {
        $items = json_decode($orden->contenido);
        return view('ordenes.pago',compact('orden','items'));
    }

    public function show(Orden $orden){

        //return $orden;
        $items = json_decode($orden->contenido);

        // $this->authorize('author', $orden);

        // $items = json_decode($orden->contenido);
        // $envio = json_decode($orden->envio);

        // return view('orders.show', compact('order', 'items', 'envio'));
        return view('ordenes.show', compact('orden','items'));

    }
}
