@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <h4>Dashboard Admin</h4>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger btn-sm">Logout</button>
            </form>
        </div>
        <div class="card-body">
            <h5>Selamat datang, {{ Auth::user()->name }}!</h5>
            <p class="text-muted">Di sini Anda bisa mengelola fitur admin selanjutnya (seperti manajemen berita atau layanan iklan).</p>
            
            <hr>
            
            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="card bg-light mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Kelola Berita</h5>
                            <p class="card-text">Tambah, edit, atau hapus berita.</p>
                            <a href="{{ route('admin.news.index') }}" class="btn btn-primary btn-sm">Buka Fitur</a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card bg-light mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Kelola Layanan</h5>
                            <p class="card-text">Atur daftar servis/tarif yang tersedia.</p>
                            <a href="{{ route('admin.services.index') }}" class="btn btn-primary btn-sm">Buka Fitur</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection