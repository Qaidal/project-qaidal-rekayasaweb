@extends('layouts.app')

@section('content')

<h2 class="fw-bold text-center mb-2">💰 Cek Tarif Pengiriman</h2>
<p class="text-center text-muted mb-5">Hitung estimasi biaya pengiriman paket Anda</p>

<div class="row justify-content-center">
    <div class="col-md-7">
        <div class="card shadow border-0">
            <div class="card-body p-4">

                <div class="mb-3">
                    <label class="form-label fw-bold">Kota Asal</label>
                    <select class="form-select" id="kotaAsal">
                        <option value="">-- Pilih Kota Asal --</option>
                        <option value="jakarta">Jakarta</option>
                        <option value="bandung">Bandung</option>
                        <option value="surabaya">Surabaya</option>
                        <option value="medan">Medan</option>
                        <option value="makassar">Makassar</option>
                        <option value="yogyakarta">Yogyakarta</option>
                        <option value="semarang">Semarang</option>
                        <option value="bali">Bali</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Kota Tujuan</label>
                    <select class="form-select" id="kotaTujuan">
                        <option value="">-- Pilih Kota Tujuan --</option>
                        <option value="jakarta">Jakarta</option>
                        <option value="bandung">Bandung</option>
                        <option value="surabaya">Surabaya</option>
                        <option value="medan">Medan</option>
                        <option value="makassar">Makassar</option>
                        <option value="yogyakarta">Yogyakarta</option>
                        <option value="semarang">Semarang</option>
                        <option value="bali">Bali</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Berat Paket (kg)</label>
                    <input type="number" class="form-control" id="berat"
                           placeholder="Contoh: 2" min="1" max="500">
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold">Jenis Layanan</label>
                    <select class="form-select" id="layanan">
                        <option value="">-- Pilih Layanan --</option>
                        <option value="regular">SPX Regular (2-5 Hari)</option>
                        <option value="nextday">SPX Next Day (1 Hari)</option>
                        <option value="sameday">SPX Same Day (Hari Ini)</option>
                        <option value="cargo">SPX Cargo (3-7 Hari)</option>
                    </select>
                </div>

                <button class="btn btn-primary w-100 btn-lg" onclick="hitungTarif()">
                    💰 Hitung Tarif
                </button>

            </div>
        </div>

        <div id="hasilTarif" style="display:none;" class="mt-4">
            <div class="card shadow border-0 border-top border-4 border-primary">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-4 text-primary">📋 Estimasi Biaya Pengiriman</h5>
                    <table class="table table-borderless">
                        <tr>
                            <td class="text-muted">Rute</td>
                            <td class="fw-bold" id="rute"></td>
                        </tr>
                        <tr>
                            <td class="text-muted">Berat</td>
                            <td class="fw-bold" id="beratDisplay"></td>
                        </tr>
                        <tr>
                            <td class="text-muted">Layanan</td>
                            <td class="fw-bold" id="layananDisplay"></td>
                        </tr>
                        <tr>
                            <td class="text-muted">Estimasi Waktu</td>
                            <td class="fw-bold text-success" id="estimasiWaktu"></td>
                        </tr>
                        <tr class="border-top">
                            <td class="fw-bold fs-5">Total Tarif</td>
                            <td class="fw-bold fs-4 text-primary" id="totalTarif"></td>
                        </tr>
                    </table>
                    <div class="alert alert-info mb-0">
                        ℹ️ Harga belum termasuk asuransi dan biaya tambahan lainnya.
                        Tarif dapat berubah sewaktu-waktu.
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="col-md-4">
        <div class="card shadow border-0 h-100">
            <div class="card-header bg-primary text-white fw-bold py-3">
                📊 Referensi Tarif per kg
            </div>
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Layanan</th>
                            <th>Tarif/kg</th>
                            <th>Estimasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>SPX Regular</td>
                            <td>Rp 9.000</td>
                            <td>2-5 Hari</td>
                        </tr>
                        <tr>
                            <td>SPX Next Day</td>
                            <td>Rp 18.000</td>
                            <td>1 Hari</td>
                        </tr>
                        <tr>
                            <td>SPX Same Day</td>
                            <td>Rp 25.000</td>
                            <td>Hari Ini</td>
                        </tr>
                        <tr>
                            <td>SPX Cargo</td>
                            <td>Rp 6.000</td>
                            <td>3-7 Hari</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer text-muted small">
                * Tarif jarak jauh (luar pulau) dikenakan biaya tambahan 20%
            </div>
        </div>
    </div>
</div>

<script>
    const jarakJauh = ['medan', 'makassar', 'bali'];
    const tarifPerKg = {
        regular: { harga: 9000, label: 'SPX Regular', waktu: '2-5 Hari Kerja' },
        nextday: { harga: 18000, label: 'SPX Next Day', waktu: '1 Hari Kerja' },
        sameday: { harga: 25000, label: 'SPX Same Day', waktu: 'Hari Ini' },
        cargo: { harga: 6000, label: 'SPX Cargo', waktu: '3-7 Hari Kerja' },
    };

    function hitungTarif() {
        const asal = document.getElementById('kotaAsal').value;
        const tujuan = document.getElementById('kotaTujuan').value;
        const berat = parseInt(document.getElementById('berat').value);
        const layanan = document.getElementById('layanan').value;

        if (!asal || !tujuan || !berat || !layanan) {
            alert('Lengkapi semua data terlebih dahulu!');
            return;
        }

        if (asal === tujuan) {
            alert('Kota asal dan tujuan tidak boleh sama!');
            return;
        }

        const tarif = tarifPerKg[layanan];
        let total = tarif.harga * berat;

        const isJauh = jarakJauh.includes(asal) || jarakJauh.includes(tujuan);
        if (isJauh) total = total * 1.2;

        const formatter = new Intl.NumberFormat('id-ID', {
            style: 'currency', currency: 'IDR', minimumFractionDigits: 0
        });

        document.getElementById('rute').innerText =
            asal.charAt(0).toUpperCase() + asal.slice(1) + ' → ' +
            tujuan.charAt(0).toUpperCase() + tujuan.slice(1);
        document.getElementById('beratDisplay').innerText = berat + ' kg';
        document.getElementById('layananDisplay').innerText = tarif.label;
        document.getElementById('estimasiWaktu').innerText = tarif.waktu;
        document.getElementById('totalTarif').innerText = formatter.format(total);

        document.getElementById('hasilTarif').style.display = 'block';
        document.getElementById('hasilTarif').scrollIntoView({ behavior: 'smooth' });
    }
</script>

@endsection