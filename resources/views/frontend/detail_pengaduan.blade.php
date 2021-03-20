@extends('layout.app')
@section('head')
    <style>
        img {
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 5px;
            width: 400px;
        }
    </style>
@endsection
@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-5">
                            <h5>Informasi pelapor</h5>
                            <table>
                                <tr>
                                    <td style="width : 200px">NIK</td>
                                    <td>:</td>
                                    <td>{{ $pengaduan->user->nik }}</td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td>{{ $pengaduan->user->name }}</td>
                                </tr>
                                <tr>
                                    <td>Username</td>
                                    <td>:</td>
                                    <td>{{ $pengaduan->user->username }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td>{{ $pengaduan->user->email }}</td>
                                </tr>
                                <tr>
                                    <td>Telp</td>
                                    <td>:</td>
                                    <td>{{ $pengaduan->user->telp }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="mb-5">
                            <h5>Isi pengaduan</h5>
                            <table>
                                <tr>
                                    <td style="width : 200px">Tanggal</td>
                                    <td>:</td>
                                    <td>{{ $pengaduan->created_at->format('d/m/y') }}</td>
                                </tr>
                                <tr>
                                    <td>Judul</td>
                                    <td>:</td>
                                    <td>{{ $pengaduan->judul }}</td>
                                </tr>
                                <tr>
                                    <td>Isi laporan</td>
                                    <td>:</td>
                                    <td>
                                        <textarea name="" class="form-control" cols="30" rows="10" disabled>{{ $pengaduan->isi_laporan }}</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Foto</td>
                                    <td>:</td>
                                    <td><img src="{{ asset($pengaduan->foto) }}" width="530px" alt="bukti_pengaduan"></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <h5>Tanggapan</h5>
                            @if ($pengaduan->status === 'selesai')
                                <p>{{ $pengaduan->tanggapan->tanggapan }}</p>
                            @endif
                            @if ($pengaduan ->status === '0' || $pengaduan->status === 'proses')
                            <div class="alert alert-info" role="alert">
                                belum ditanggapi
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection