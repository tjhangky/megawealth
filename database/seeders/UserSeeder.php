<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Users
        User::create([
            'name' => 'Theodore',
            'email' => 'theodore@gmail.com',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'name' => 'Jeremy',
            'email' => 'jeremy@gmail.com',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);
    }
}
