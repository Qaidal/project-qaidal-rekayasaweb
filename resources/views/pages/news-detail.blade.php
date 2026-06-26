@extends('layouts.app')

@section('content')
<div class="container py-5" style="max-width: 800px;">
    <a href="{{ url('/news') }}" class="btn btn-outline-secondary btn-sm mb-4">← Kembali ke Berita</a>

    <div class="card border-0 shadow-sm" style="border-radius: 12px; overflow: hidden;">
        @if($news->image && file_exists(public_path('images/' . $news->image)))
            <img src="{{ asset('images/' . $news->image) }}" class="img-fluid w-100" style="max-height: 400px; object-fit: cover;" alt="{{ $news->title }}">
        @else
            <img src="https://via.placeholder.com/800x400?text=SPX+Express+News" class="img-fluid w-100" style="max-height: 400px; object-fit: cover;" alt="{{ $news->title }}">
        @endif

        <div class="card-body p-4">
            <span class="badge bg-light text-primary mb-2">{{ $news->created_at ? $news->created_at->format('d M Y') : date('d M Y') }}</span>
            <h1 class="fw-bold text-dark mb-4">{{ $news->title }}</h1>
            
            <div class="text-muted" style="line-height: 1.8; font-size: 1.1rem; white-space: pre-line;">
                {{ $news->content }}
            </div>
        </div>
    </div>
</div>
@endsection