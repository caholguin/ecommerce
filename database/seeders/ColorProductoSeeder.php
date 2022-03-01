<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Builder;
use App\Models\Producto;

use Illuminate\Database\Seeder;

class ColorProductoSeeder extends Seeder
{
    
    public function run()
    {
        $productos = Producto::wherehas('subcategoria',function(Builder $query){
            $query->where('color',true)
            ->where('talla',false);
        })->get();

        foreach ($productos as $producto) {
            $producto->colores()->attach([
                1=> ['cantidad' => 10],
                2=> ['cantidad' => 10],
                3=> ['cantidad' => 10],
                4=> ['cantidad' => 10]
            ]);
        }
    }
}
