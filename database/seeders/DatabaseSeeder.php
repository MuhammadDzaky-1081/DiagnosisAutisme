<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Pengguna;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Pengguna::create([
            'nama_pengguna' => 'Admin',
            'jenis_kelamin' => 'Perempuan',
            'tanggal_lahir' => date('Y-m-d'),
            'status_akun' => 'Admin',
            'email_telepon' => 'admin@gmail.com',
            'username' => 'admin',
            'password' => Hash::make(123)
        ]);
    }
}
