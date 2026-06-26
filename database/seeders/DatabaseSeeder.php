<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Membuat akun admin otomatis agar Anda bisa masuk ke dashboard kembali
        User::truncate();
        User::create([
            'name' => 'Admin SPX Express',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password123'),
        ]);

        // Memanggil data bawaan otomatis layanan dan berita
        $this->call([
            ServiceSeeder::class,
            NewsSeeder::class,
        ]);
    }
}