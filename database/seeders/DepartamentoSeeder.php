<?php

namespace Database\Seeders;

use App\Models\Departamento;
use App\Models\Ciudad;
use App\Models\Distrito;
use Illuminate\Database\Seeder;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Departamento::factory(8)->create()->each(function(Departamento $departamento){
            Ciudad::factory(8)->create([
                'departamento_id' => $departamento->id
            ])->each(function(Ciudad $ciudad){
                Distrito::factory(8)->create([
                    'ciudad_id' => $ciudad->id
                ]);
            });
        });
    }
}
