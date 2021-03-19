@extends('layout.app')
@section('content')
    <div class="container mt-3">
        <div class="card mx-5">
            <div class="card-header">
                Form buat pengaduan
            </div>
            <div class="card-body">
                <form action="{{ route('pengaduan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="mb-3 row">
                        <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                        <div class="col-sm-10">
                            <input type="text" name="judul" class="form-control @error('judul')is-invalid @enderror" id="judul" required>
                            @error('judul')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="isi_laporan" class="col-sm-2 col-form-label">Isi Laporan</label>
                        <div class="col-sm-10">
                            <textarea name="isi_laporan" class="form-control @error('isi_laporan')is-invalid @enderror" id="isi_laporan" cols="30" rows="10"></textarea>
                            @error('isi_laporan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                        <div class="col-sm-10">
                            <input type="file" name="foto" class="form-control @error('foto')is-invalid @enderror" id="foto" required>
                            @error('foto')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection