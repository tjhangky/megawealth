<?php

namespace Database\Seeders;

use App\Models\Property;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Properties
        Property::create([
            'price' => 10000,
            'address' => 'Jl. Sudirman No.10, Jakarta',
            'property_type' => 'Apartment',
            'sale_type' => 'Sale',
            'status' => 'Open',
            'image' => 'properties-1.png',
        ]);

        Property::create([
            'price' => 15000,
            'address' => 'Jl. Haji Agus Salim No.11, Jakarta',
            'property_type' => 'Apartment',
            'sale_type' => 'Sale',
            'status' => 'Open',
            'image' => 'properties-2.png',
        ]);

        Property::create([
            'price' => 1500,
            'address' => 'Jl. Sudirman No.12, Jakarta',
            'property_type' => 'Apartment',
            'sale_type' => 'Rent',
            'status' => 'Open',
            'image' => 'properties-3.png',
        ]);

        Property::create([
            'price' => 2000,
            'address' => 'Jl. Galaxy No.14, Bekasi',
            'property_type' => 'Apartment',
            'sale_type' => 'Rent',
            'status' => 'Open',
            'image' => 'properties-4.png',
        ]);

        Property::create([
            'price' => 150000,
            'address' => 'Jl. Jakarta Garden City No.25, JGC',
            'property_type' => 'House',
            'sale_type' => 'Sale',
            'status' => 'Open',
            'image' => 'properties-5.png',
        ]);

        Property::create([
            'price' => 170000,
            'address' => 'Jl. Kuningan No.19, Tangerang',
            'property_type' => 'House',
            'sale_type' => 'Sale',
            'status' => 'Open',
            'image' => 'properties-6.png',
        ]);

        Property::create([
            'price' => 2000,
            'address' => 'Jl. Jendral No.7, Bandung',
            'property_type' => 'House',
            'sale_type' => 'Rent',
            'status' => 'Open',
            'image' => 'properties-7.png',
        ]);

        Property::create([
            'price' => 1500,
            'address' => 'Jl. Lubuk Minturun No.18, Padang',
            'property_type' => 'House',
            'sale_type' => 'Rent',
            'status' => 'Open',
            'image' => 'properties-8.png',
        ]);

        Property::create([
            'price' => 170000,
            'address' => 'Jl. Kemayoran No.20, Surabaya',
            'property_type' => 'House',
            'sale_type' => 'Sale',
            'status' => 'Open',
            'image' => 'properties-9.png',
        ]);

        Property::create([
            'price' => 1500,
            'address' => 'Jl. Mangunsakoro No.1, Jakarta',
            'property_type' => 'Apartment',
            'sale_type' => 'Rent',
            'status' => 'Open',
            'image' => 'properties-10.png',
        ]);
    }
}
