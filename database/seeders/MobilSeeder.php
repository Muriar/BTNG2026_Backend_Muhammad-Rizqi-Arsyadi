<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mobil;

class MobilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama' => 'Avanza 1.5 G CVT',
                'brand' => 'Toyota',
                'harga' => 275000000,
                'tahun' => 2024,
                'transmisi' => 'CVT',
                'bahan_bakar' => 'Bensin',
                'status' => 'tersedia',
            ],
            [
                'nama' => 'Civic RS Turbo',
                'brand' => 'Honda',
                'harga' => 615000000,
                'tahun' => 2023,
                'transmisi' => 'Manual',
                'bahan_bakar' => 'Bensin',
                'status' => 'tersedia',
            ],
            [
                'nama' => 'Xpander Ultimate',
                'brand' => 'Mitsubishi',
                'harga' => 330000000,
                'tahun' => 2024,
                'transmisi' => 'Matic',
                'bahan_bakar' => 'Bensin',
                'status' => 'sold',
            ],
            [
                'nama' => 'Fortuner 2.4 VRZ',
                'brand' => 'Toyota',
                'harga' => 570000000,
                'tahun' => 2023,
                'transmisi' => 'Matic',
                'bahan_bakar' => 'Diesel',
                'status' => 'tersedia',
            ],
            [
                'nama' => 'Ioniq 5 Signature',
                'brand' => 'Hyundai',
                'harga' => 780000000,
                'tahun' => 2024,
                'transmisi' => 'Matic',
                'bahan_bakar' => 'Listrik',
                'status' => 'tersedia',
            ],
            [
                'nama' => 'Brio RS Manual',
                'brand' => 'Honda',
                'harga' => 205000000,
                'tahun' => 2022,
                'transmisi' => 'Manual',
                'bahan_bakar' => 'Bensin',
                'status' => 'tersedia',
            ],
            [
                'nama' => 'Corolla Cross Hybrid',
                'brand' => 'Toyota',
                'harga' => 495000000,
                'tahun' => 2024,
                'transmisi' => 'CVT',
                'bahan_bakar' => 'Hybrid',
                'status' => 'sold',
            ],
        ];

        foreach ($data as $item) {
            Mobil::create($item);
        }
    }
}
