<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Color;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colores = ['white','blue','red','black'];

        foreach ($colores as  $color) {
            Color::create([
                'nombre' => $color,
            ]);
        }
    }
}
