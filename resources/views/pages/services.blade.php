@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="fw-bold text-center mb-5">Layanan Kami</h2>
    <div class="row g-4">
        @foreach($services as $item)
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0" style="border-radius:12px; overflow:hidden;">
                
                @if($item->image && file_exists(public_path('images/' . $item->image)))
                    <img src="{{ asset('images/' . $item->image) }}"
                         class="card-img-top"
                         style="height:200px; object-fit:cover;"
                         alt="{{ $item->name }}">
                @else
                    <img src="https://via.placeholder.com/400x200?text=SPX+Express"
                         class="card-img-top"
                         style="height:200px; object-fit:cover;"
                         alt="{{ $item->name }}">
                @endif

                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold text-dark">{{ $item->name }}</h5>
                    <p class="card-text text-muted flex-grow-1">{{ $item->description }}</p>
                    
                    <p class="fw-bold text-success mb-0 mt-2">
                        Tarif: Rp {{ number_format($item->price, 0, ',', '.') }}
                    </p>

                    <a href="{{ route('services.detail', $item->id) }}"
                       class="btn btn-primary mt-3 w-100 fw-bold">
                        Lihat Detail →
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection