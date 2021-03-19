@extends('layout.app')
@section('content')
    <div class="container mt-3">
        <h4>{{ $pengaduan->judul }}</h4>
        <p>{{ $pengaduan->isi_laporan }}</p>
        <img src="{{ asset($pengaduan->foto) }}" width="500" alt="berkas_pendukung">
        @if ($pengaduan->status === 'ditanggapi')
        <h6>Tanggapan</h6>
        <p>{{ $pengaduan->tanggapan->tanggapan }}</p>
        @endif
    </div>
@endsection