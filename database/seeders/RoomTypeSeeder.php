<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
        public function run() {
            $data = [
                ['code' => 'A', 'name' => 'Tipe Premium', 'image' => 'rooms/kamar1.jpeg', 'facilities' => 'Full AC, Smart TV, Kamar Mandi Dalam, WiFi'],
                ['code' => 'B', 'name' => 'Tipe Standar Plus', 'image' => 'rooms/kamar2.jpeg', 'facilities' => 'Full AC, Kamar Mandi Dalam, WiFi'],
                ['code' => 'C', 'name' => 'Tipe Dasar', 'image' => 'rooms/kamar3.jpeg', 'facilities' => 'Kipas Angin, Kamar Mandi Luar, WiFi'],
            ];

            foreach($data as $d) { \App\Models\RoomType::create($d); }
        }
}
