<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->only(['name', 'description', 'price']);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }

        Service::create($data);
        return redirect()->route('admin.services.index')->with('success', 'Layanan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        $others = Service::where('id', '!=', $id)->take(3)->get();
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $service = Service::findOrFail($id);
        
        $service->name = $request->name;
        $service->description = $request->description;
        $service->price = $request->price;

        if ($request->hasFile('image')) {
            // Hapus file lama jika ada dan bukan gambar dumi bawaan seeder
            if ($service->image && File::exists(public_path('images/' . $service->image)) && !in_array($service->image, ['regular.jpg', 'sameday.jpg', 'nextday.jpg', 'international.jpg', 'cargo.jpg'])) {
                File::delete(public_path('images/' . $service->image));
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $service->image = $imageName;
        }

        $service->save();
        return redirect()->route('admin.services.index')->with('success', 'Layanan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        
        if ($service->image && File::exists(public_path('images/' . $service->image)) && !in_array($service->image, ['regular.jpg', 'sameday.jpg', 'nextday.jpg', 'international.jpg', 'cargo.jpg'])) {
            File::delete(public_path('images/' . $service->image));
        }

        $service->delete();
        return redirect()->route('admin.services.index')->with('success', 'Layanan berhasil dihapus!');
    }
}