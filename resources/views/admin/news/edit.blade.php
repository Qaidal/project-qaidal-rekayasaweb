@extends('layouts.app')

@section('content')
<div class="container mt-5" style="max-width: 700px;">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>📝 Edit Berita</h4>
        <a href="{{ route('admin.news.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label fw-bold">Judul Berita</label>
                    <input type="text" name="title" class="form-control" id="title" value="{{ $news->title }}" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label fw-bold d-block">Foto Saat Ini</label>
                    @if($news->image)
                        <img src="{{ asset('images/news/' . $news->image) }}" class="img-thumbnail mb-2" style="max-height: 150px;">
                    @else
                        <p class="text-muted small">Belum ada foto.</p>
                    @endif
                    <input type="file" name="image" class="form-control" accept="image/*">
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label fw-bold">Isi Konten Berita</label>
                    <textarea name="content" class="form-control" id="content" rows="6" required>{{ $news->content }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary w-100">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</div>
@endsection