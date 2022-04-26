<?php

use App\Models\Producto;
use App\Models\Talla;
use App\Models\Color;
use Gloudemans\Shoppingcart\Facades\Cart;

function cantidad($producto_id, $color_id = 2, $talla_id = 1)
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
    cantidad($producto_id, $color_id, $talla_id) - qty_added($producto_id, $color_id, $talla_id);
}

function discount($item){
    $producto = Producto::find($item->id);
    $qty_available = qty_available($item->id, $item->options->color_id, $item->options->talla_id);


    if ($item->options->talla_id) {
        
        $talla = Talla::find($item->options->talla_id);

        $talla->colores()->detach($item->options->color_id);

        $talla->colores->attach([
            $item->options->color_id => ['cantidad' => $qty_available]
        ]);

    }elseif ($item->options->color_id) {

        $producto->colores()->detach($item->options->color_id);

        $producto->colores->attach([
            $item->options->color_id => ['cantidad' => $qty_available]
        ]);

    }else {
        $producto->cantidad = $qty_available;
        $producto->save();
    }


}

function increase($item){
    
    $producto = Producto::find($item->id);

    $cantidad = cantidad($item->id, $item->options->color_id, $item->options->talla_id) + $item->cantidad;


    if ($item->options->talla_id) {
        
        $talla = Talla::find($item->options->talla_id);

        $talla->colores()->detach($item->options->color_id);

        $talla->colores->attach([
            $item->options->color_id => ['cantidad' => $cantidad]
        ]);

    }elseif ($item->options->color_id) {

        $producto->colores()->detach($item->options->color_id);

        $producto->colores->attach([
            $item->options->color_id => ['cantidad' => $cantidad]
        ]);

    }else {
        $producto->cantidad = $cantidad;
        $producto->save();
    }

    
}