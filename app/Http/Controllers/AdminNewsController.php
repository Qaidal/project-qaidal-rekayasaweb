<?php

namespace App\Http\Controllers;

// Memanggil model News & facade File dengan benar agar tidak memicu garis merah di VS Code
use App\Models\News; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminNewsController extends Controller
{
    /**
     * Halaman Utama Kelola Berita (Sisi Admin)
     */
    public function index()
    {
        $news = News::latest()->get();
        return view('admin.news.index', compact('news')); 
    }

    /**
     * Form Tambah Berita Baru
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Menyimpan Data Berita Baru ke Database
     */
   public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|string', // <-- Ubah validasi jadi string/URL teks biasa
        ]);

        $data = $request->only(['title', 'content', 'image']);

        // HAPUS ATAU KOMENTARI PROSES $request->image->move() YANG LAMA

        \App\Models\News::create($data);
        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil ditambahkan!');
    }
    /**
     * Form Edit Berita
     */
    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('admin.news.edit', compact('news'));
    }

    /**
     * Memperbarui Data Berita di Database
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $news = News::findOrFail($id);
        
        $news->title = $request->title;
        $news->content = $request->content;

        if ($request->hasFile('image')) {
            // Hapus file foto lama jika ada dan bukan gambar default seeder
            if ($news->image && File::exists(public_path('images/' . $news->image)) && !in_array($news->image, ['fulfillment.jpg', 'regular.jpg', 'international.jpg', 'cargo.jpg', 'spx1.jpg', 'spx2.jpg'])) {
                File::delete(public_path('images/' . $news->image));
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $news->image = $imageName;
        }

        $news->save();

        return redirect()->route('admin.news.index')->with('success', 'Berita sukses diperbarui!');
    }

    /**
     * Menghapus Berita dari Sistem
     */
    public function destroy($id)
    {
        $news = News::findOrFail($id);
        
        if ($news->image && File::exists(public_path('images/' . $news->image)) && !in_array($news->image, ['fulfillment.jpg', 'regular.jpg', 'international.jpg', 'cargo.jpg', 'spx1.jpg', 'spx2.jpg'])) {
            File::delete(public_path('images/' . $news->image));
        }

        $news->delete();

        return redirect()->route('admin.news.index')->with('success', 'Berita sukses dihapus!');
    }
}