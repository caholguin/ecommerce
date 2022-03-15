<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('categorias');
        Storage::deleteDirectory('subcategorias');
        Storage::deleteDirectory('productos');
        
        Storage::makeDirectory('categorias');
        Storage::makeDirectory('subcategorias');
        Storage::makeDirectory('productos');

        $this->call(UserSeeder::class);
        $this->call(CategoriaSeeder::class);
        $this->call(SubCategoriaSeeder::class);
        $this->call(ProductoSeeder::class);
        $this->call(ColorSeeder::class);
        $this->call(ColorProductoSeeder::class);
        $this->call(TallaSeeder::class);

        $this->call(ColorTallaSeeder::class);
    }
}
