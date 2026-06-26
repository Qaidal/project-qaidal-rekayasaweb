@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>📰 Manajemen Berita SPX Express</h4>
        <div>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary btn-sm me-2">Ke Dashboard</a>
            <a href="{{ route('admin.news.create') }}" class="btn btn-success btn-sm">+ Tambah Berita</a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success shadow-sm">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="table-responsive">
            <table class="table table-striped align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th width="60">No</th>
                        <th width="120">Foto</th>
                        <th>Judul Berita</th>
                        <th width="180">Tanggal Dibuat</th>
                        <th width="180">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($news as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            @if($item->image && file_exists(public_path('images/' . $item->image)))
                                <img src="{{ asset('images/' . $item->image) }}" alt="Berita" class="img-thumbnail" style="width: 80px; height: 50px; object-fit: cover;">
                            @else
                                <img src="https://via.placeholder.com/150x100?text=SPX+News" alt="Berita" class="img-thumbnail" style="width: 80px; height: 50px; object-fit: cover;">
                            @endif
                        </td>
                        <td class="fw-bold text-dark">{{ $item->title }}</td>
                        <td>{{ $item->created_at ? $item->created_at->format('d M Y') : date('d M Y') }}</td>
                        <td>
                            <a href="{{ route('admin.news.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.news.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus berita ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-muted">Belum ada data berita.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection