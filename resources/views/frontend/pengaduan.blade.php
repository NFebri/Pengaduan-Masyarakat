@extends('layout.app')
@section('content')
    <div class="container mt-3">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('pengaduan.search') }}" method="POST">
            @method('POST')
            @csrf
            <div class="input-group mb-3">
                <input type="text" name="keyword" class="form-control" placeholder="cari pengaduan berdasarkan judul" required>
                <button class="btn btn-outline-primary" type="submit">Cari</button>
            </div>
        </form>

        <a href="{{ route('pengaduan.create') }}" class="btn btn-primary mb-3">Buat pengaduan</a>

        @forelse ($pengaduan as $item)
            <div class="card mb-3">
                <div class="card-body">
                    <span>{{ $item->created_at->format('d/m/y') }}</span>
                    <h5 class="card-title"><a href="{{ route('pengaduan.show', Crypt::encrypt( $item->id)) }}">{{ $item->judul }}</a></h5>
                    <p class="card-text">{{ strip_tags(Str::limit($item->isi_laporan, 200)) }}</p>
                    @if ($item->status === '0')
                        <button class="btn btn-sm btn-danger" disabled>belum diproses</button>
                    @endif
                    @if ($item->status === 'proses')
                        <button class="btn btn-sm btn-warning" disabled>proses</button>
                    @endif
                    @if ($item->status === 'selesai')
                        <button class="btn btn-sm btn-success" disabled>selesai</button>
                    @endif
                </div>
            </div>
        @empty
            <div class="alert alert-primary" role="alert">
                Anda belum membuat pengaduan
            </div>
        @endforelse
        <div>
            {{ $pengaduan->links() }}
        </div>
    </div>
@endsection