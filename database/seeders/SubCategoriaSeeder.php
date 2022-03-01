<?php

namespace Database\Seeders;

use App\Models\SubCategoria;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SubCategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subcategorias = [
            //Celulares y tablets
            [
                'categoria_id' => 1,
                'nombre' => 'Celulares y smartphones',
                'slug' => Str::slug('Celulares y smartphones'),
                'color' => true
            ],
            [
                'categoria_id' => 1,
                'nombre' => 'Accesorios para celulares',
                'slug' => Str::slug('Accesorios para celulares'),
            ],
            [
                'categoria_id' => 1,
                'nombre' => 'Smartwaches',
                'slug' => Str::slug('Smartwaches'),
            ],

            //Tv audio y video

            [
                'categoria_id' => 2,
                'nombre' => 'Tv y audio',
                'slug' => Str::slug('Tv y audio'),
            ],
            [
                'categoria_id' => 2,
                'nombre' => 'Audios',
                'slug' => Str::slug('Audios'),
            ],
            [
                'categoria_id' => 2,
                'nombre' => 'Audio para autos',
                'slug' => Str::slug('Audio para autos'),
            ],

            //Consolas y videojuegos

            [
                'categoria_id' => 3,
                'nombre' => 'Xbox',
                'slug' => Str::slug('Xbox'),
            ],
            [
                'categoria_id' => 3,
                'nombre' => 'Play Station',
                'slug' => Str::slug('Play Station'),
            ],
            [
                'categoria_id' => 3,
                'nombre' => 'Videojuegos paraNintendo',
                'slug' => Str::slug('Videojuegos paraNintendo'),
            ],
            [
                'categoria_id' => 3,
                'nombre' => 'Nintendo',
                'slug' => Str::slug('Nintendo'),
            ],

            //Computación

            [
                'categoria_id' => 4,
                'nombre' => 'Portatiles',
                'slug' => Str::slug('Portatiles'),
            ],     
            [
                'categoria_id' => 4,
                'nombre' => 'Pc de escritorio',
                'slug' => Str::slug('Pc de escritorio'),
            ],   
            [
                'categoria_id' => 4,
                'nombre' => 'Almacenamiento',
                'slug' => Str::slug('Almacenamiento'),
            ],   
            [
                'categoria_id' => 4,
                'nombre' => 'Accesorios de computadoras',
                'slug' => Str::slug('Accesorios de computadoras'),
            ],   
            
            //Moda

            [
                'categoria_id' => 5,
                'nombre' => 'Mujeres',
                'slug' => Str::slug('Mujeres'),
                'color' =>true,
                'talla' => true
            ],   
            [
                'categoria_id' => 5,
                'nombre' => 'Hombres',
                'slug' => Str::slug('Hombres'),
                'color' =>true,
                'talla' => true
            ],  
            [
                'categoria_id' => 5,
                'nombre' => 'Lentes',
                'slug' => Str::slug('Lentes'),
            ],  
            [
                'categoria_id' => 5,
                'nombre' => 'Relojes',
                'slug' => Str::slug('Relojes'),
            ],  
        ];

        foreach ($subcategorias as $subcategoria) {
            SubCategoria::factory(1)->create($subcategoria);
        }
    }
}
