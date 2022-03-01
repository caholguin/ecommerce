<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Database\Eloquent\Builder;
use App\Models\Producto;

class TallaSeeder extends Seeder
{
    
    public function run()
    {
        $productos = Producto::wherehas('subcategoria',function(Builder $query){
            $query->where('color',true)
            ->where('talla',true);
        })->get();

        $tallas = ['talla S','talla M', 'talla L'];

        foreach ($productos as $producto) {

            foreach ($tallas as $talla) {
                $producto->tallas()->create([
                    'nombre' => $talla
                ]);
            }
           
        }
    }
}
