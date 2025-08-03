<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\Petugas::create([
            'nama_lengkap' => 'admin',
            'username' => 'admin1',
            'slug' => 'admin1',
            'password' => bcrypt('admin123'),
            'is_active' => '1',
            'role' => 'admin',
        ]);
    }
}
