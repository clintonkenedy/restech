<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mesa;

class MesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mesa::create(['numero' => '01', 'estado' => 'Disponible']);
        Mesa::create(['numero' => '02', 'estado' => 'Disponible']);
        Mesa::create(['numero' => '03', 'estado' => 'Disponible']);
        Mesa::create(['numero' => '04', 'estado' => 'Disponible']);
        Mesa::create(['numero' => '05', 'estado' => 'Disponible']);
        Mesa::create(['numero' => '06', 'estado' => 'Disponible']);
        Mesa::create(['numero' => '07', 'estado' => 'Disponible']);
        Mesa::create(['numero' => '08', 'estado' => 'Disponible']);
        Mesa::create(['numero' => '09', 'estado' => 'Disponible']);
    }
}
