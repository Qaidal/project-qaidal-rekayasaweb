<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        Service::truncate();

        Service::create([
            'name' => 'SPX Regular',
            'description' => 'Layanan pengiriman standar dengan estimasi 2-5 hari kerja ke seluruh wilayah Indonesia dengan harga terjangkau.',
            'price' => 10000,
            'image' => 'regular.jpg'
        ]);

        Service::create([
            'name' => 'SPX Same Day',
            'description' => 'Pengiriman di hari yang sama dalam kota. Pesan sebelum jam 12 siang, paket tiba di hari yang sama.',
            'price' => 25000,
            'image' => 'sameday.jpg'
        ]);

        Service::create([
            'name' => 'SPX Next Day',
            'description' => 'Garansi pengiriman keesokan hari ke lebih dari 200 kota besar di seluruh Indonesia.',
            'price' => 15000,
            'image' => 'nextday.jpg'
        ]);

        Service::create([
            'name' => 'SPX International',
            'description' => 'Layanan pengiriman internasional ke 8 negara Asia Tenggara dengan harga kompetitif dan tracking real-time.',
            'price' => 50000,
            'image' => 'international.jpg'
        ]);

        Service::create([
            'name' => 'SPX Cargo',
            'description' => 'Solusi pengiriman barang besar dan berat untuk kebutuhan bisnis dengan kapasitas hingga 500 kg per paket.',
            'price' => 35000,
            'image' => 'cargo.jpg'
        ]);
    }
}