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
            'property_type' => 'Apartment',
            'sale_type' => 'Sale',
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

        Property::create([
            'price' => 4000,
            'address' => 'Jl. Raya Kedungwringin No.4',
            'property_type' => 'Apartment',
            'sale_type' => 'Rent',
            'status' => 'Open',
            'image' => '',
        ]);

        Property::create([
            'price' => 5000,
            'address' => 'Jl. Raya Kedungwringin No.5',
            'property_type' => 'House',
            'sale_type' => 'Sale',
            'status' => 'Open',
            'image' => '',
        ]);

        Property::create([
            'price' => 6000,
            'address' => 'Jl. Raya Kedungwringin No.6',
            'property_type' => 'House',
            'sale_type' => 'Sale',
            'status' => 'Open',
            'image' => '',
        ]);

        Property::create([
            'price' => 7000,
            'address' => 'Jl. Raya Kedungwringin No.7',
            'property_type' => 'House',
            'sale_type' => 'Rent',
            'status' => 'Open',
            'image' => '',
        ]);

        Property::create([
            'price' => 8000,
            'address' => 'Jl. Raya Kedungwringin No.8',
            'property_type' => 'House',
            'sale_type' => 'Rent',
            'status' => 'Open',
            'image' => '',
        ]);
    }
}
