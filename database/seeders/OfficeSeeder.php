<?php

namespace Database\Seeders;

use App\Models\Office;
use Illuminate\Database\Seeder;

class OfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
    }
}
