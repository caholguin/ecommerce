<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Categoria;
use App\Models\Marca;

class CategoriaSeeder extends Seeder
{
    
    public function run()
    {
        $categorias = [
            [
                'nombre' => 'Celulares y tablets',
                'slug' => Str::slug('Celulares y tablets'),
                'icono' => '<i class="fa-solid fa-tablet-screen-button"></i>'
            ],
            [
                'nombre' => 'Tv audio y video',
                'slug' => Str::slug('Tv audio y video'),
                'icono' => '<i class="fas fa-tv"></i>'
            ],
            [
                'nombre' => 'Consolas y videojuegos',
                'slug' => Str::slug('Consolas y videojuegos'),
                'icono' => '<i class="fas fa-gamepad"></i>'
            ],
            [
                'nombre' => 'Computación',
                'slug' => Str::slug('Computación'),
                'icono' => '<i class="fas fa-laptop-code"></i>'
            ],
            [
                'nombre' => 'Moda',
                'slug' => Str::slug('Moda'),
                'icono' => '<i class="fas fa-tshirt"></i>'
            ],
        ];

        foreach ($categorias as $categoria) {
            $categoria = Categoria::factory(1)->create($categoria)->first();

            $marcas = Marca::factory(4)->create();

            foreach ($marcas as $marca) {
                $marca->categorias()->attach($categoria->id);
            }

        }
    }
}
