<?php

namespace App\Observers;
use App\Models\Producto;
use App\Models\SubCategoria;

class ProductoObserver
{
    public function updated(Producto $producto)
    {
        $subcategoria_id = $producto->subcategoria_id;
        $subcategoria = SubCategoria::find($subcategoria_id);

        if ($subcategoria->talla) {
            if ($producto->colores->count()) {
                $producto->colores()->detach();
            }
        }elseif ($subcategoria->color) {
            if ($producto->tallas->count()) {
                foreach ($producto->tallas as $talla) {
                    $talla->delete();
                }
            }        
        }else{
            if ($producto->colores->count()) {
                $producto->colores()->detach();
            }

            if ($producto->tallas->count()) {
                foreach ($producto->tallas as $talla) {
                    $talla->delete();
                }
            }        
        }
    }
}
