<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{Guestbook, User};

class GenerateGuestbook extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 5; $i++) {
            Guestbook::factory()
                ->count(50)
                ->create();
        }
    }
}
