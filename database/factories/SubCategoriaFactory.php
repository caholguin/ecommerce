<?php

namespace Database\Factories;

use App\Models\SubCategoria;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubCategoriaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'imagen' => 'subcategorias/' . $this->faker->image('public/storage/subcategorias',640, 480, null,false)
        ];
    }
}
