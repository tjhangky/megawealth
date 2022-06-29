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
            'name' => 'Bojong Office',
            'address' => 'Jl. Patriot Baja No.3',
            'contact_name' => 'James Arifin',
            'contact_phone' => '0812-1436-5830',
            'image' => '',
        ]);

        Office::create([
            'name' => 'Kebumen Office',
            'address' => 'Jl. Raya Kebumen No.55',
            'contact_name' => 'Viktor Priyadi',
            'contact_phone' => '0812-3456-7890',
            'image' => '',
        ]);

        Office::create([
            'name' => 'Jakarta Office',
            'address' => 'Jl. Kebon Jeruk Raya No.22',
            'contact_name' => 'Jansen Tomat',
            'contact_phone' => '0812-3456-7890',
            'image' => '',
        ]);
        
        Office::create([
            'name' => 'Pomala Office',
            'address' => 'Jl. Raya Kedungwringin No.4',
            'contact_name' => 'Merry Poniyem',
            'contact_phone' => '0812-3456-7890',
            'image' => '',
        ]);

        Office::create([
            'name' => 'Manokwari Office',
            'address' => 'Jl. Raya Kedungwringin No.5',
            'contact_name' => 'Maria ',
            'contact_phone' => '0812-3456-7890',
            'image' => '',
        ]);

        Office::create([
            'name' => 'Padang Office',
            'address' => 'Jl. Raya Kedungwringin No.6',
            'contact_name' => 'Jeremy',
            'contact_phone' => '0812-3456-7890',
            'image' => '',
        ]);
    }
}
