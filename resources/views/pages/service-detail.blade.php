@extends('layouts.app')

@section('content')

<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}" style="color:#FF6B00;">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('services') }}" style="color:#FF6B00;">Layanan</a></li>
        <li class="breadcrumb-item active">{{ $service->name }}</li>
    </ol>
</nav>

<div class="row g-5 mb-5">
    <div class="col-md-6">
        <img src="{{ asset('images/' . $service->image) }}"
             class="img-fluid rounded-4 shadow"
             style="width:100%; height:380px; object-fit:cover;"
             alt="{{ $service->name }}">
    </div>
    <div class="col-md-6 d-flex flex-column justify-content-center">
        <span class="badge mb-3 px-3 py-2 fs-6" style="background-color:#FF6B00; width:fit-content;">
            🚚 Layanan SPX Express
        </span>
        <h1 class="fw-bold mb-3">{{ $service->name }}</h1>
        <p class="fs-5 text-muted mb-4">{{ $service->description }}</p>

        @php
            $info = [
                'SPX Regular'       => ['⏱ Estimasi' => '2-5 Hari Kerja',  '💰 Tarif/kg' => 'Rp 9.000',  '📦 Maks. Berat' => '30 kg',   '🌏 Jangkauan' => 'Seluruh Indonesia'],
                'SPX Same Day'      => ['⏱ Estimasi' => 'Hari Ini',        '💰 Tarif/kg' => 'Rp 25.000', '📦 Maks. Berat' => '20 kg',   '🌏 Jangkauan' => 'Dalam Kota'],
                'SPX Next Day'      => ['⏱ Estimasi' => '1 Hari Kerja',    '💰 Tarif/kg' => 'Rp 18.000', '📦 Maks. Berat' => '30 kg',   '🌏 Jangkauan' => '200+ Kota'],
                'SPX International' => ['⏱ Estimasi' => '3-7 Hari Kerja',  '💰 Tarif/kg' => 'Rp 45.000', '📦 Maks. Berat' => '50 kg',   '🌏 Jangkauan' => '8 Negara ASEAN'],
                'SPX Cargo'         => ['⏱ Estimasi' => '3-7 Hari Kerja',  '💰 Tarif/kg' => 'Rp 6.000',  '📦 Maks. Berat' => '500 kg',  '🌏 Jangkauan' => 'Seluruh Indonesia'],
                'SPX Fulfillment'   => ['⏱ Estimasi' => 'Sesuai Order',    '💰 Biaya'    => 'Hubungi CS', '📦 Kapasitas'   => 'Unlimited','🌏 Jangkauan' => 'Seluruh Indonesia'],
            ];
            $detail = $info[$service->name] ?? [];
        @endphp

        @if(!empty($detail))
        <div class="row g-3 mb-4">
            @foreach($detail as $label => $value)
            <div class="col-6">
                <div class="p-3 rounded-3" style="background-color:#fff3e8;">
                    <small class="text-muted d-block">{{ $label }}</small>
                    <span class="fw-bold fs-6">{{ $value }}</span>
                </div>
            </div>
            @endforeach
        </div>
        @endif

        <div class="d-flex gap-3">
            <a href="{{ route('tarif') }}" class="btn btn-primary btn-lg fw-bold px-4">
                💰 Cek Tarif
            </a>
            <a href="{{ route('tracking') }}" class="btn btn-outline-secondary btn-lg px-4">
                📦 Tracking
            </a>
        </div>
    </div>
</div>

<div class="rounded-4 p-5 mb-5" style="background-color:#fff3e8;">
    <h4 class="fw-bold text-center mb-4">Keunggulan {{ $service->name }}</h4>
    <div class="row g-4 text-center">
        <div class="col-md-3">
            <div class="fs-2 mb-2">✅</div>
            <h6 class="fw-bold">Terpercaya</h6>
            <p class="text-muted small">Dipercaya jutaan pelanggan di seluruh Indonesia</p>
        </div>
        <div class="col-md-3">
            <div class="fs-2 mb-2">📱</div>
            <h6 class="fw-bold">Mudah Digunakan</h6>
            <p class="text-muted small">Pesan lewat aplikasi SPX kapan saja dan di mana saja</p>
        </div>
        <div class="col-md-3">
            <div class="fs-2 mb-2">🔔</div>
            <h6 class="fw-bold">Notifikasi Real-Time</h6>
            <p class="text-muted small">Update status paket langsung ke WhatsApp & email kamu</p>
        </div>
        <div class="col-md-3">
            <div class="fs-2 mb-2">🛡️</div>
            <h6 class="fw-bold">Asuransi Paket</h6>
            <p class="text-muted small">Setiap paket dilindungi asuransi penuh hingga nilai barang</p>
        </div>
    </div>
</div>

<h4 class="fw-bold mb-4">Layanan Lainnya</h4>
<div class="row g-4">
    @foreach($others as $item)
    <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100" style="border-radius:12px; overflow:hidden;">
            <img src="{{ asset('images/' . $item->image) }}"
                 style="height:160px; object-fit:cover;"
                 class="card-img-top"
                 alt="{{ $item->name }}">
            <div class="card-body">
                <h6 class="fw-bold">{{ $item->name }}</h6>
                <p class="text-muted small">{{ Str::limit($item->description, 80) }}</p>
                <a href="{{ route('services.detail', $item->id) }}"
                   class="btn btn-sm btn-primary fw-bold w-100">
                    Lihat Detail →
                </a>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection