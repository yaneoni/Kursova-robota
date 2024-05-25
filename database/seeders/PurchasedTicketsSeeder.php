<?php

namespace Database\Seeders;

use App\Models\PurchasedTicket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PurchasedTicketsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seeding test payments
        for ($i = 0; $i < 10; $i++) {
            $purchasedTicket = [
                'user_id' => random_int(1, 5),
                'ticket_id' => random_int(1, 3),
                'quantity' => random_int(1, 6),
            ];

            PurchasedTicket::create($purchasedTicket);
        }
    }
}
