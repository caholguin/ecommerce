<?php

namespace App\Http\Controllers;

use App\Models\Orden;
use Illuminate\Http\Request;

class OrdenController extends Controller
{
    public function index()
    {
        $ordenes = Orden::query()->where('user_id', auth()->user()->id);

        if (request('estado')) {
            $ordenes->where('estado',request('estado'));
        }

        $ordenes = $ordenes->get();

        $pendiente = Orden::where('estado',1)->where('user_id', auth()->user()->id)->count();
        $recibido  = Orden::where('estado',2)->where('user_id', auth()->user()->id)->count();
        $enviado   = Orden::where('estado',3)->where('user_id', auth()->user()->id)->count();
        $entregado = Orden::where('estado',4)->where('user_id', auth()->user()->id)->count();
        $anulado   = Orden::where('estado',5)->where('user_id', auth()->user()->id)->count();

        return view('ordenes.index',compact('ordenes','pendiente','recibido','enviado','entregado','anulado'));
    }

    public function pago(Orden $orden)
    {
        $this->authorize('author',$orden);

        $items = json_decode($orden->contenido);
        return view('ordenes.pago',compact('orden','items'));
    }

    public function show(Orden $orden){

        $this->authorize('author',$orden);

        $items = json_decode($orden->contenido);
        $envio = json_decode($orden->envio);
        // $this->authorize('author', $orden);

        // $items = json_decode($orden->contenido);
        // $envio = json_decode($orden->envio);

        // return view('orders.show', compact('order', 'items', 'envio'));
        return view('ordenes.show', compact('orden','items','envio'));

    }
}
