@extends('layouts.app')

@section('content')
<div class="container mt-5" style="max-width: 700px;">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>📦 Tambah Layanan Baru</h4>
        <a href="{{ route('admin.services.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('admin.services.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Nama Layanan</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Contoh: SPX Instant, SPX Hemat" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label fw-bold">Deskripsi / Estimasi Waktu</label>
                    <input type="text" name="description" class="form-control" id="description" placeholder="Contoh: Pengiriman cepat 2-3 jam" required>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label fw-bold">Tarif Layanan (Rp)</label>
                    <input type="number" name="price" class="form-control" id="price" placeholder="Contoh: 15000" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Simpan Layanan</button>
            </form>
        </div>
    </div>
</div>
@endsection