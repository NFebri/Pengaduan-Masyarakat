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
                            @if ($item->status === '0')
                                <span class="badge bg-danger">belum diproses</span>
                            @endif
                            @if ($item->status === 'proses')
                                <span class="badge bg-warning">proses</span>
                            @endif
                            @if ($item->status === 'selesai')
                                <span class="badge bg-success">selssai</span>
                            @endif
                        </td>
                        <td class="d-grid gap-2 d-md-block">
                            <a href="{{ route('complaint.show', Crypt::Encrypt($item->id)) }}" class="btn btn-sm btn-primary">Detail</a>
                            @if (Auth::user()->role === 'admin')
                            <a href="{{ route('complaint.generate', $item->id) }}" class="btn btn-sm btn-dark">Print</a>
                            @endif
                            @if ($item->status === 'proses')
                            <a href="{{ route('complaint.setstatus', $item->id) }}" class="btn btn-sm btn-success">terima</a>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">
                            <span class="text-center">Data pengaduan tidak ada</span>
                        </td>
                    </tr>
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