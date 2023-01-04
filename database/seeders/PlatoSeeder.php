<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Plato;


class PlatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plato::create(['nombre' => 'Lomo Saltado', 'costo' => '10.00']);
        Plato::create(['nombre' => 'Estofado de Pollo', 'costo' => '15.00']);
        Plato::create(['nombre' => 'Ceviche de Mariscos', 'costo' => '20.00']);
        Plato::create(['nombre' => 'Combinado Chaufa + Ceviche', 'costo' => '12.00']);
        Plato::create(['nombre' => 'Seco de Pollo', 'costo' => '09.00']);
        Plato::create(['nombre' => 'Sopa de Pollo', 'costo' => '09.00']);
        Plato::create(['nombre' => 'Tiradito', 'costo' => '18.00']);
        Plato::create(['nombre' => 'Churrasco', 'costo' => '10.00']);
    }
}
