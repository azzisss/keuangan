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

        // \App\Models\User::factory()->create([
        //     'username' => 'Admin',
        //     'passwor' => '12345',
        // ]);
        \App\Models\User::factory()->create([
            'id_akses' => '1',
            'name'     => 'Aji',
            'username' => 'Admin',
            'password' => 'Admin',
        ]);
        \App\Models\User::factory()->create([
            'id_akses' => '2',
            'name'     => 'Bayu',
            'username' => 'Owner',
            'password' => 'Owner',
        ]);
        \App\Models\Akses::factory()->create([
            'nama_akses'     => 'Admin',
            'deskripsi_akses' => 'Dapat Mengakses Semua Fitur pada Aplikasi',
        ]);
        \App\Models\Akses::factory()->create([
            'nama_akses'     => 'Owner',
            'deskripsi_akses' => 'Akses Terbatas pada Fitur tertentu',
        ]);
    }
}
