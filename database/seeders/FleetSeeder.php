<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fleet;

class FleetSeeder extends Seeder
{
    public function run(): void
    {
        Fleet::updateOrCreate(
            ['code' => 'pickup'],
            [
                'name' => 'Pickup',
                'size' => 'Kecil',
                'price_per_km' => 1000,
                'capacity_m3' => 1.50,
                'description' => 'Pickup kecil untuk muatan ringan dengan kapasitas sekitar 1.5 m³.',
            ]
        );

        Fleet::updateOrCreate(
            ['code' => 'dumptruck'],
            [
                'name' => 'Dumptruck',
                'size' => 'Sedang',
                'price_per_km' => 2000,
                'capacity_m3' => 7.00,
                'description' => 'Dumptruck sedang dengan kapasitas sekitar 7 m³ untuk pengiriman menengah.',
            ]
        );

        Fleet::updateOrCreate(
            ['code' => 'tronton'],
            [
                'name' => 'Truk Tronton',
                'size' => 'Besar',
                'price_per_km' => 1500,
                'capacity_m3' => 20.00,
                'description' => 'Truk tronton besar dengan kapasitas sekitar 20 m³ untuk muatan besar.',
            ]
        );
    }
}
