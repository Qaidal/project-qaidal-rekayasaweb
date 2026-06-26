@extends('layouts.app')

@section('content')

<div class="text-white rounded-4 p-5 mb-5 text-center" style="background-color:#FF6B00;">
    <h1 class="display-4 fw-bold">🚚 SPX Express</h1>
    <p class="lead fs-4">Solusi Pengiriman Cepat, Aman & Terpercaya Se-Asia Tenggara</p>
    <a href="{{ route('services') }}" class="btn btn-light btn-lg mt-2 me-2 fw-bold" style="color:#FF6B00;">Lihat Layanan Kami</a>
    <a href="{{ route('news') }}" class="btn btn-outline-light btn-lg mt-2">Berita Terbaru</a>
</div>

<div class="row align-items-center mb-5">
    <div class="col-md-4 text-center">
        <img src="{{ asset('images/chris feng.jpg') }}"
            class="rounded-circle shadow"
            style="width:220px; height:220px; object-fit:cover; object-position:top; border: 4px solid #FF6B00;"
            alt="Chris Feng">
        <h5 class="mt-3 fw-bold">Chris Feng</h5>
        <p class="text-muted">CEO & Founder SPX Express</p>
        <div class="d-flex justify-content-center gap-2">
            <span class="badge text-white" style="background-color:#FF6B00;">Logistics Expert</span>
            <span class="badge text-white" style="background-color:#FF6B00;">15+ Years</span>
        </div>
    </div>
    <div class="col-md-8">
        <h2 class="fw-bold mb-3">Tentang Pemimpin Kami</h2>
        <p class="fs-5">Chris Feng adalah pendiri dan CEO SPX Express, perusahaan logistik terkemuka di Asia Tenggara yang telah melayani jutaan pelanggan sejak 2015.</p>
        <p class="text-muted">Dengan pengalaman lebih dari 15 tahun di industri logistik dan e-commerce, beliau memimpin SPX Express untuk terus berkembang dan memberikan layanan pengiriman terbaik di Indonesia dan seluruh Asia Tenggara.</p>
        <div class="row mt-4 text-center">
            <div class="col-4">
                <h3 class="fw-bold" style="color:#FF6B00;">10Jt+</h3>
                <p class="text-muted">Paket Terkirim</p>
            </div>
            <div class="col-4">
                <h3 class="fw-bold" style="color:#FF6B00;">8</h3>
                <p class="text-muted">Negara Asia Tenggara</p>
            </div>
            <div class="col-4">
                <h3 class="fw-bold" style="color:#FF6B00;">50Rb+</h3>
                <p class="text-muted">Mitra Kurir</p>
            </div>
        </div>
    </div>
</div>

<div class="rounded-4 p-5 mb-4" style="background-color:#fff3e8;">
    <h2 class="fw-bold text-center mb-4">Mengapa Pilih SPX Express?</h2>
    <div class="row g-4 text-center">
        <div class="col-md-3">
            <div class="fs-1">⚡</div>
            <h5 class="fw-bold">Pengiriman Cepat</h5>
            <p class="text-muted">Same day & next day delivery tersedia di seluruh kota besar Indonesia</p>
        </div>
        <div class="col-md-3">
            <div class="fs-1">🔒</div>
            <h5 class="fw-bold">Aman & Terjamin</h5>
            <p class="text-muted">Setiap paket diasuransikan dan dipantau secara real-time</p>
        </div>
        <div class="col-md-3">
            <div class="fs-1">📦</div>
            <h5 class="fw-bold">Tracking Real-Time</h5>
            <p class="text-muted">Pantau status paket Anda kapan saja dan di mana saja</p>
        </div>
        <div class="col-md-3">
            <div class="fs-1">💰</div>
            <h5 class="fw-bold">Harga Terjangkau</h5>
            <p class="text-muted">Tarif kompetitif dengan kualitas pengiriman premium</p>
        </div>
    </div>
</div>

@endsection