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
                'icono' => '<i class="fa-solid fa-mobile-notch"></i>'
            ],
            [
                'nombre' => 'Tv audio y video',
                'slug' => Str::slug('Tv audio y video'),
                'icono' => '<i class="fa-solid fa-tv-music"></i>'
            ],
            [
                'nombre' => 'Consolas y videojuegos',
                'slug' => Str::slug('Consolas y videojuegos'),
                'icono' => '<i class="fa-regular fa-gamepad-modern"></i>'
            ],
            [
                'nombre' => 'Computación',
                'slug' => Str::slug('Computación'),
                'icono' => '<i class="fa-regular fa-laptop-code"></i>'
            ],
            [
                'nombre' => 'Moda',
                'slug' => Str::slug('Moda'),
                'icono' => '<i class="fa-regular fa-shirt"></i>'
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
