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
        // Users
        User::create([
            'name' => 'Theodore',
            'email' => 'theodore@gmail.com',
            'password' => bcrypt('theodore123'),
        ]);

        User::create([
            'name' => 'Jeremy',
            'email' => 'jeremy@gmail.com',
            'password' => bcrypt('jeremy123'),
        ]);

        // Offices
        Office::create([
            'name' => 'Office 1',
            'address' => 'Jl. Raya Kedungwringin No.1',
            'contact_name' => 'Theodore',
            'contact_phone' => '0812-3456-7890',
            'image' => '',
        ]);

        Office::create([
            'name' => 'Office 2',
            'address' => 'Jl. Raya Kedungwringin No.2',
            'contact_name' => 'Jeremy',
            'contact_phone' => '0812-3456-7890',
            'image' => '',
        ]);

        Office::create([
            'name' => 'Office 3',
            'address' => 'Jl. Raya Kedungwringin No.3',
            'contact_name' => 'Jeremy',
            'contact_phone' => '0812-3456-7890',
            'image' => '',
        ]);
        
        Office::create([
            'name' => 'Office 4',
            'address' => 'Jl. Raya Kedungwringin No.4',
            'contact_name' => 'Jeremy',
            'contact_phone' => '0812-3456-7890',
            'image' => '',
        ]);

        Office::create([
            'name' => 'Office 5',
            'address' => 'Jl. Raya Kedungwringin No.5',
            'contact_name' => 'Jeremy',
            'contact_phone' => '0812-3456-7890',
            'image' => '',
        ]);

        Office::create([
            'name' => 'Office 6',
            'address' => 'Jl. Raya Kedungwringin No.6',
            'contact_name' => 'Jeremy',
            'contact_phone' => '0812-3456-7890',
            'image' => '',
        ]);


        // Properties
        Property::create([
            'price' => 1000,
            'address' => 'Jl. Raya Kedungwringin No.1',
            'property_type' => 'Apartment',
            'sale_type' => 'Sale',
            'status' => 'Open',
            'image' => '',
        ]);

        Property::create([
            'price' => 2000,
            'address' => 'Jl. Raya Kedungwringin No.2',
            'property_type' => 'House',
            'sale_type' => 'Rent',
            'status' => 'Open',
            'image' => '',
        ]);

        Property::create([
            'price' => 3000,
            'address' => 'Jl. Raya Kedungwringin No.3',
            'property_type' => 'Apartment',
            'sale_type' => 'Rent',
            'status' => 'Open',
            'image' => '',
        ]);
    }
}
