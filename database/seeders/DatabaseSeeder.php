<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Bersihkan tabel sebelum mengisi (Opsional agar tidak duplikat)
        DB::table('users')->truncate();

        DB::table('users')->insert([
            [
                'username' => 'admin_sarana',
                'nis' => null, // Admin tidak punya NIS
                'password' => Hash::make('passwordadmin'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'sinta_ambar',
                'password' => Hash::make('passwordsiswa'),
                'nis' => '1234567890',
                'role' => 'siswa',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}