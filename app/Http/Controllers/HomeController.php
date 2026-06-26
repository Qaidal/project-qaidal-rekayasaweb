<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\News;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Diubah menjadi pages.home karena filenya ada di dalam folder pages
        return view('pages.home');
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

    public function serviceDetail($id)
    {
        $service = Service::findOrFail($id);
        $others = Service::where('id', '!=', $id)->take(3)->get();

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
        // 1. Ambil semua data berita dari database Aiven, urutkan dari yang terbaru
        $news = News::latest()->get(); 

        // 2. Kirim variabel $news ke file blade
        return view('pages.news', compact('news'));
    }

    public function newsDetail($id)
    {
        // 1. Ambil data berita berdasarkan ID, simpan ke variabel $news (sesuai Blade)
        $news = News::findOrFail($id);
        
        // 2. Ambil 3 berita lain untuk rekomendasi di bagian bawah jika ada
        $otherNews = News::where('id', '!=', $id)->latest()->take(3)->get();

        // 3. Masukkan 'news' dan 'otherNews' ke dalam compact
        return view('pages.news-detail', compact('news', 'otherNews'));
    }
}