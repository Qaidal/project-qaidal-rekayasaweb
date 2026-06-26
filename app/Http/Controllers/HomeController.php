<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Halaman Utama / Beranda Publik
     */
    public function index()
    {
        $services = Service::all();
        $news = News::latest()->take(4)->get();

        return view('pages.home', compact('services', 'news'));
    }

    /**
     * Halaman Tentang Kami
     */
    public function about()
    {
        return view('pages.about'); 
    }

    /**
     * Daftar Layanan Publik
     */
    public function services()
    {
        $services = Service::all();
        return view('pages.services', compact('services')); 
    }

    /**
     * Detail Layanan Tunggal
     */
    public function serviceDetail($id)
    {
        $service = Service::findOrFail($id);
        return view('pages.service-detail', compact('service')); 
    }

    /**
     * Halaman Cek Resi / Tracking
     */
    public function tracking()
    {
        return view('pages.tracking'); 
    }

    /**
     * Halaman Cek Tarif
     */
    public function tarif()
    {
        return view('pages.tarif'); 
    }

    /**
     * Halaman Daftar Berita
     */
    public function news()
    {
        $news = News::latest()->get();
        return view('pages.news', compact('news')); 
    }

    /**
     * Halaman Isi Detail Berita
     */
    public function newsDetail($id)
    {
        $news = News::findOrFail($id);
        return view('pages.news-detail', compact('news')); 
    }
}