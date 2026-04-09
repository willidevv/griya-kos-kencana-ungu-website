<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
public function run(): void
{
    \App\Models\User::create([
        'name' => 'Fauzan Super Admin',
        'email' => 'superadmin@kencanaungu.com',
        'password' => bcrypt('password123'), // Ini nanti jadi password login
        'role' => 'super_admin',
    ]);

    \App\Models\User::create([
        'name' => 'Admin Kost',
        'email' => 'admin@kencanaungu.com',
        'password' => bcrypt('password123'),
        'role' => 'admin',
    ]);
}
}
