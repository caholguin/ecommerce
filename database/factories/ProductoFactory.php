<?php

namespace Database\Factories;

use App\Models\Marca;
use App\Models\SubCategoria;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $nombre = $this->faker->sentence(2);

        $subcategoria = SubCategoria::all()->random();

        $categoria = $subcategoria->categoria;

        $marca = $categoria->marcas->random();

        if ($subcategoria->color) {
            $cantidad = null;
        }else{
            $cantidad = 15;
        }

        return [
            'nombre' => $nombre,
            'slug' => Str::slug($nombre),
            'descripcion' => $this->faker->text(),
            'precio' => $this->faker->randomElement([19.99,49.99,99.99]),
            'subcategoria_id' => $subcategoria->id,
            'marca_id' => $marca->id,
            'cantidad' => $cantidad,
            'estado' => 1
        ];
    }
}
