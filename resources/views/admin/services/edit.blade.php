@extends('layouts.app')

@section('content')
<div class="container mt-5" style="max-width: 700px;">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>📦 Edit Layanan & Tarif</h4>
        <a href="{{ route('admin.services.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('admin.services.update', $service->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Nama Layanan</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ $service->name }}" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label fw-bold">Deskripsi / Estimasi Waktu</label>
                    <input type="text" name="description" class="form-control" id="description" value="{{ $service->description }}" required>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label fw-bold">Tarif Layanan (Rp)</label>
                    <input type="number" name="price" class="form-control" id="price" value="{{ $service->price }}" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Perbarui Layanan</button>
            </form>
        </div>
    </div>
</div>
@endsection