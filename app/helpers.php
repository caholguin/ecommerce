<?php

use App\Models\Producto;
use App\Models\Talla;
use Gloudemans\Shoppingcart\Facades\Cart;

function cantidad($producto_id, $color_id = null, $talla_id = null)
{
    $producto = Producto::find($producto_id);

    if ($talla_id) {
        $talla = Talla::find($talla_id);
        $cantidad = $talla->colores->find($color_id)->pivot->cantidad;
        
    }elseif ($color_id) {
        $cantidad = $producto->colores->find($color_id)->pivot->cantidad;
    }else{
        $cantidad = $producto->cantidad;
    }
    return $cantidad;
}

function qty_added($producto_id, $color_id = null, $talla_id = null)
{
    $cart = Cart::content();

    $item = $cart->where('id',$producto_id)
                ->where('options.color_id', $color_id)
                ->where('options.talla_id', $talla_id)
                ->first();


    if ($item) {
        return $item->qty;
    }else{
        return 0;
    }
}

function qty_available($producto_id, $color_id = null, $talla_id = null)
{
    //  return 4;
    return cantidad($producto_id, $color_id, $talla_id) - qty_added($producto_id, $color_id, $talla_id);
}