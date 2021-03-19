@extends('layout.app')
@section('head')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
@endsection
@section('content')
    <div class="container mt-3">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <table class="table table-striped" id="pengaduan">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Status</th>
                    <th scope="col">opsi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pengaduan as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->judul }}</td>
                        <td>
                            @if ($item->status === 'pending')
                                <span class="badge bg-warning">pending</span>
                            @endif
                            @if ($item->status === 'ditanggapi')
                                <span class="badge bg-info">ditanggapi</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('complaint.show', Crypt::Encrypt($item->id)) }}" class="btn btn-sm btn-primary">Detail</a>
                        </td>
                    </tr>
                @empty
                    
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
@section('script')
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#pengaduan').DataTable();
        } );
    </script>
@endsection