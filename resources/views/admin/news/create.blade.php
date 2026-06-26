@extends('layouts.app')

@section('content')
<div class="container mt-5" style="max-width: 700px;">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>📰 Tambah Berita Baru</h4>
        <a href="{{ route('admin.news.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label fw-bold">Judul Berita</label>
                    <input type="text" name="title" class="form-control" id="title" required>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label fw-bold">Foto Sampul Berita</label>
                    <input type="file" name="image" class="form-control" id="image" accept="image/*">
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label fw-bold">Isi Konten Berita</label>
                    <textarea name="content" class="form-control" id="content" rows="6" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary w-100">Terbitkan Berita</button>
            </form>
        </div>
    </div>
</div>
@endsection