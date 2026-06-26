@extends('layouts.app')

@section('content')

<h2 class="fw-bold text-center mb-2">📦 Tracking Paket</h2>
<p class="text-center text-muted mb-5">Masukkan nomor resi untuk melacak paket Anda</p>

<div class="row justify-content-center mb-5">
    <div class="col-md-7">
        <div class="card shadow border-0">
            <div class="card-body p-4">
                <label class="form-label fw-bold">Nomor Resi</label>
                <div class="input-group">
                    <span class="input-group-text bg-primary text-white">🚚</span>
                    <input type="text"
                           id="resiInput"
                           class="form-control form-control-lg"
                           placeholder="Contoh: SPX1234567890ID"
                           maxlength="20">
                    <button class="btn btn-primary btn-lg px-4" onclick="cekResi()">
                        Lacak
                    </button>
                </div>
                <small class="text-muted mt-2 d-block">
                    Contoh nomor resi: SPX1234567890ID, SPX9876543210ID
                </small>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-8" id="hasilTracking" style="display:none;">
        <div class="card shadow border-0">
            <div class="card-header bg-primary text-white py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="mb-0 fw-bold">📦 Detail Paket</h5>
                        <small id="nomorResiDisplay"></small>
                    </div>
                    <span class="badge bg-warning text-dark fs-6" id="statusBadge"></span>
                </div>
            </div>
            <div class="card-body p-4">

                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <div class="bg-light rounded p-3">
                            <small class="text-muted">Pengirim</small>
                            <p class="fw-bold mb-0" id="pengirim"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="bg-light rounded p-3">
                            <small class="text-muted">Penerima</small>
                            <p class="fw-bold mb-0" id="penerima"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="bg-light rounded p-3">
                            <small class="text-muted">Asal</small>
                            <p class="fw-bold mb-0" id="asal"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="bg-light rounded p-3">
                            <small class="text-muted">Tujuan</small>
                            <p class="fw-bold mb-0" id="tujuan"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="bg-light rounded p-3">
                            <small class="text-muted">Layanan</small>
                            <p class="fw-bold mb-0" id="layanan"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="bg-light rounded p-3">
                            <small class="text-muted">Estimasi Tiba</small>
                            <p class="fw-bold mb-0 text-primary" id="estimasi"></p>
                        </div>
                    </div>
                </div>

                <h6 class="fw-bold mb-3">Riwayat Pengiriman</h6>
                <div id="timeline"></div>

            </div>
        </div>
    </div>

    <div class="col-md-7" id="tidakDitemukan" style="display:none;">
        <div class="alert alert-danger text-center py-4">
            <div class="fs-1 mb-2">❌</div>
            <h5 class="fw-bold">Nomor Resi Tidak Ditemukan</h5>
            <p class="mb-0">Pastikan nomor resi yang Anda masukkan sudah benar.</p>
        </div>
    </div>
</div>

<script>
    const dummyData = {
        'SPX1234567890ID': {
            pengirim: 'Toko Elektronik Jaya - Jakarta',
            penerima: 'Budi Santoso - Surabaya',
            asal: 'Jakarta Barat',
            tujuan: 'Surabaya Selatan',
            layanan: 'SPX Regular',
            estimasi: 'Besok, 29 April 2026',
            status: 'Dalam Perjalanan',
            timeline: [
                { waktu: '28 Apr 2026, 08.00', lokasi: 'Hub Jakarta Barat', keterangan: 'Paket telah diambil dari pengirim', done: true },
                { waktu: '28 Apr 2026, 12.30', lokasi: 'Sortir Center Jakarta', keterangan: 'Paket sedang disortir di pusat distribusi', done: true },
                { waktu: '28 Apr 2026, 18.00', lokasi: 'Dalam Perjalanan ke Surabaya', keterangan: 'Paket sedang dalam perjalanan ke kota tujuan', done: true },
                { waktu: '29 Apr 2026, 09.00', lokasi: 'Hub Surabaya', keterangan: 'Paket tiba di hub tujuan', done: false },
                { waktu: '29 Apr 2026, 14.00', lokasi: 'Kurir Mengantar', keterangan: 'Paket sedang diantar ke alamat penerima', done: false },
            ]
        },
        'SPX9876543210ID': {
            pengirim: 'Fashion Store Bandung',
            penerima: 'Dewi Lestari - Medan',
            asal: 'Bandung',
            tujuan: 'Medan Kota',
            layanan: 'SPX Next Day',
            estimasi: 'Hari ini, 28 April 2026',
            status: 'Terkirim ✓',
            timeline: [
                { waktu: '27 Apr 2026, 09.00', lokasi: 'Hub Bandung', keterangan: 'Paket diterima di hub', done: true },
                { waktu: '27 Apr 2026, 14.00', lokasi: 'Bandara Husein Sastranegara', keterangan: 'Paket dikirim via udara', done: true },
                { waktu: '28 Apr 2026, 07.00', lokasi: 'Hub Medan', keterangan: 'Paket tiba di Medan', done: true },
                { waktu: '28 Apr 2026, 11.30', lokasi: 'Medan Kota', keterangan: 'Paket berhasil diterima oleh Dewi Lestari', done: true },
            ]
        },
    };

    function cekResi() {
        const resi = document.getElementById('resiInput').value.trim().toUpperCase();
        const hasil = document.getElementById('hasilTracking');
        const tidakDitemukan = document.getElementById('tidakDitemukan');

        hasil.style.display = 'none';
        tidakDitemukan.style.display = 'none';

        if (!resi) {
            alert('Masukkan nomor resi terlebih dahulu!');
            return;
        }

        if (dummyData[resi]) {
            const data = dummyData[resi];
            document.getElementById('nomorResiDisplay').innerText = 'Resi: ' + resi;
            document.getElementById('statusBadge').innerText = data.status;
            document.getElementById('pengirim').innerText = data.pengirim;
            document.getElementById('penerima').innerText = data.penerima;
            document.getElementById('asal').innerText = data.asal;
            document.getElementById('tujuan').innerText = data.tujuan;
            document.getElementById('layanan').innerText = data.layanan;
            document.getElementById('estimasi').innerText = data.estimasi;

            let timelineHTML = '<div class="position-relative">';
            data.timeline.forEach((item, index) => {
                const isLast = index === data.timeline.length - 1;
                const color = item.done ? 'bg-primary' : 'bg-secondary';
                const textColor = item.done ? '' : 'text-muted';
                timelineHTML += `
                    <div class="d-flex gap-3 mb-3">
                        <div class="d-flex flex-column align-items-center">
                            <div class="rounded-circle ${color} text-white d-flex align-items-center justify-content-center"
                                 style="width:32px;height:32px;font-size:14px;flex-shrink:0;">
                                ${item.done ? '✓' : '○'}
                            </div>
                            ${!isLast ? `<div style="width:2px;height:40px;background:${item.done ? '#0d6efd' : '#ccc'};"></div>` : ''}
                        </div>
                        <div class="pb-2 ${textColor}">
                            <p class="mb-0 fw-bold">${item.keterangan}</p>
                            <small class="text-muted">📍 ${item.lokasi} &nbsp;·&nbsp; 🕐 ${item.waktu}</small>
                        </div>
                    </div>
                `;
            });
            timelineHTML += '</div>';
            document.getElementById('timeline').innerHTML = timelineHTML;

            hasil.style.display = 'block';
        } else {
            tidakDitemukan.style.display = 'block';
        }
    }

    // Enter key support
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('resiInput').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') cekResi();
        });
    });
</script>

@endsection