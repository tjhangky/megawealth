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
            'image' => 'office-1.png',
        ]);

        Office::create([
            'name' => 'Kebumen Office',
            'address' => 'Jl. Raya Kebumen No.55',
            'contact_name' => 'Viktor Priyadi',
            'contact_phone' => '0812-3456-7890',
            'image' => 'office-2.png',
        ]);

        Office::create([
            'name' => 'Jakarta Office',
            'address' => 'Jl. Kebon Jeruk Raya No.22',
            'contact_name' => 'Jansen Tomat',
            'contact_phone' => '0812-3456-7890',
            'image' => 'office-3.png',
        ]);
        
        Office::create([
            'name' => 'Pomala Office',
            'address' => 'Jl. Haji Agus Salim No.4',
            'contact_name' => 'Merry Poniyem',
            'contact_phone' => '0812-3456-7890',
            'image' => 'office-4.png',
        ]);

        Office::create([
            'name' => 'Manokwari Office',
            'address' => 'Jl. Mangunsakoro No.5',
            'contact_name' => 'Maria ',
            'contact_phone' => '0812-3456-7890',
            'image' => 'office-5.png',
        ]);

        Office::create([
            'name' => 'Padang Office',
            'address' => 'Jl. Bypass No.16',
            'contact_name' => 'Jeremy',
            'contact_phone' => '0812-3456-7890',
            'image' => 'office-6.png',
        ]);

        Office::create([
            'name' => 'Bekasi Office',
            'address' => 'Jl. Galaxy No.7',
            'contact_name' => 'Jeremy',
            'contact_phone' => '0812-3456-7890',
            'image' => 'office-7.png',
        ]);

        Office::create([
            'name' => 'Bandung Office',
            'address' => 'Jl. Otista No.15',
            'contact_name' => 'Jeremy',
            'contact_phone' => '0812-3456-7890',
            'image' => 'office-8.png',
        ]);

        Office::create([
            'name' => 'Pekanbaru Office',
            'address' => 'Jl. Ahmad Yani No.21',
            'contact_name' => 'Jeremy',
            'contact_phone' => '0812-3456-7890',
            'image' => 'office-9.png',
        ]);

        Office::create([
            'name' => 'Surabaya Office',
            'address' => 'Jl. Sudirman No.9',
            'contact_name' => 'Jeremy',
            'contact_phone' => '0812-3456-7890',
            'image' => 'office-10.png',
        ]);
    }
}
