@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>🚚 Manajemen Layanan & Tarif SPX</h4>
        <div>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary btn-sm me-2">Ke Dashboard</a>
            <a href="{{ route('admin.services.create') }}" class="btn btn-success btn-sm">+ Tambah Layanan</a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success shadow-sm">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="table-responsive">
            <table class="table table-striped align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th width="60">No</th>
                        <th width="120">Foto</th>
                        <th>Nama Layanan</th>
                        <th>Deskripsi / Estimasi</th>
                        <th>Tarif Dasar (Rp)</th>
                        <th width="180">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($services as $index => $service)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            @if($service->image && file_exists(public_path('images/' . $service->image)))
                                <img src="{{ asset('images/' . $service->image) }}" alt="{{ $service->name }}" class="img-thumbnail" style="width: 80px; height: 50px; object-fit: cover;">
                            @else
                                <span class="badge bg-secondary">No Photo</span>
                            @endif
                        </td>
                        <td class="fw-bold text-primary">{{ $service->name }}</td>
                        <td>{{ $service->description }}</td>
                        <td class="fw-bold">Rp {{ number_format($service->price, 0, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('admin.services.edit', $service->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus layanan ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-muted">Belum ada data layanan kurir.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection