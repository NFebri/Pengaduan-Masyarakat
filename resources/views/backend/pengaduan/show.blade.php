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
                    <div class="card-bldy">
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
                                        <textarea name="" class="form-control" id="" cols="30" rows="10" disabled>{!! $pengaduan->isi_laporan !!}</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Foto</td>
                                    <td>:</td>
                                    <td><img src="{{ asset($pengaduan->foto) }}" width="700px" alt="bukti_pengaduan"></td>
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
                            @if ($pengaduan->status === 'proses' || $pengaduan->status === 'selesai')
                                <p>{{ $pengaduan->tanggapan->tanggapan }}</p>
                            @endif
                            @if ($pengaduan ->status === '0')
                            <form action="{{ route('complaint.tanggapan', $pengaduan->id) }}" method="POST" class="mb-5">
                                @method('POST')
                                @csrf
                                <div class="mb-3 row">
                                    <label for="tanggapan" class="col-sm-2 col-form-label">tanggapan</label>
                                    <div class="col-sm-10">
                                        <textarea name="tanggapan" class="form-control" id="tanggapan" cols="30" rows="10"></textarea>
                                        @error('tanggapan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection