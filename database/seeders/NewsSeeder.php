<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        News::truncate();

        News::create([
            'title' => 'SPX Express Ekspansi ke 50 Kota Baru di Indonesia',
            'content' => 'Dalam rangka meningkatkan jangkauan layanan, SPX Express secara resmi membuka jaringan logistik dan sorting hub baru di 50 kota yang tersebar di seluruh Indonesia.',
            'image' => 'fulfillment.jpg'
        ]);

        News::create([
            'title' => 'SPX Express Luncurkan Fitur Live Tracking Terbaru',
            'content' => 'Fitur live tracking teranyar ini memungkinkan konsumen melihat posisi kurir secara real-time langsung melalui peta di aplikasi integrasi sistem.',
            'image' => 'regular.jpg'
        ]);
    }
}