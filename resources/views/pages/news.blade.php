@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="fw-bold text-center mb-5">Berita Terkini SPX</h2>
    <div class="row g-4">
        @foreach($news as $item)
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0" style="border-radius:12px; overflow:hidden;">
                
                @if($item->image && file_exists(public_path('images/' . $item->image)))
                    <img src="{{ asset('images/' . $item->image) }}" class="card-img-top" style="height:180px; object-fit:cover;" alt="{{ $item->title }}">
                @else
                    <img src="https://via.placeholder.com/400x250?text=SPX+News" class="card-img-top" style="height:180px; object-fit:cover;" alt="{{ $item->title }}">
                @endif

                <div class="card-body d-flex flex-column">
                    <span class="badge bg-light text-primary align-self-start mb-2">{{ $item->created_at ? $item->created_at->format('d M Y') : date('d M Y') }}</span>
                    <h5 class="card-title fw-bold text-dark">{{ $item->title }}</h5>
                    <p class="card-text text-muted small flex-grow-1">{{ Str::limit(strip_tags($item->content), 90) }}</p>
                    
                    <a href="{{ route('news.detail', $item->id) }}" class="btn btn-primary mt-3 w-100 fw-bold">
                        Baca Selengkapnya →
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection