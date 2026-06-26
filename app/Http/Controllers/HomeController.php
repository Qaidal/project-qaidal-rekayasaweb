<?php

namespace App\Http\Controllers;

use App\Models\Service;
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
        return view('pages.news');
    }

    public function newsDetail($id)
    {
        return view('pages.news-detail');
    }
}