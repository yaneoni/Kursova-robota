<?php

namespace Database\Seeders;

use App\Models\Ticket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tickets = [
            ['type' => 'adult', 'price' => 20.00],
            ['type' => 'kids', 'price' => 10.00],
            ['type' => 'educators', 'price' => 15.00],
        ];

        foreach ($tickets as $ticket) {
            Ticket::create($ticket);
        }
    }
}
