<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Office;
use App\Models\Property;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            OfficeSeeder::class,
            UserSeeder::class,
            PropertySeeder::class,
        ]);
    }
}
