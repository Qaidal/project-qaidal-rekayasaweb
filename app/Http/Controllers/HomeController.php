<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function services()
    {
        $services = Service::all();
        return view('pages.services', compact('services'));
    }

    /**
     * KODE FINAL DETAIL LAYANAN (FIX ERROR $OTHERS)
     */
    public function serviceDetail($id)
    {
        // 1. Ambil data layanan utama berdasarkan ID
        $service = Service::findOrFail($id);

        // 2. Ambil maksimal 3 layanan lain untuk rekomendasi di bagian bawah halaman
        $others = Service::where('id', '!=', $id)->take(3)->get();

        // 3. Kirim data ke file blade detail Anda
        return view('pages.service-detail', compact('service', 'others'));
    }

    public function tracking()
    {
        return view('pages.tracking');
    }

    public function tarif()
    {
        return view('pages.tarif');
    }

    public function news()
    {
        // Jika Anda memiliki model News, bisa disesuaikan di sini nanti
        return view('pages.news');
    }

    public function newsDetail($id)
    {
        return view('pages.news-detail');
    }
}