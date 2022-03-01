<?php

namespace Database\Seeders;
use App\Models\Producto;
use App\Models\Imagen;

use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    
    public function run()
    {
        Producto::factory(250)->create()->each(function(Producto $producto){
            Imagen::factory(4)->create([
                'imageable_id' => $producto->id,
                'imageable_type' => Producto::class
            ]);
        });
    }
}
