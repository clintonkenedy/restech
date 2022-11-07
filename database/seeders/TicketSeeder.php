<?php

namespace Database\Seeders;

use App\Models\Ticket;
use App\Models\Plato;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 9; $i++) {
            Ticket::create(
                [
                    'plato_id' => rand(1,8),
                    'mesa_id' => rand(1,9),
                ]
            );
        }
    }
}
