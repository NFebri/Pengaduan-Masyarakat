@extends('layout.app')
@section('head')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">	
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
@endsection
@section('content')
    <div class="container mt-3">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        
        <p>
            <a class="btn btn-primary" data-bs-toggle="collapse" href="#admincollapse" role="button" aria-expanded="false" aria-controls="admincollapse">
                Admin
            </a>
            <a class="btn btn-primary" data-bs-toggle="collapse" href="#petugascollapse" role="button" aria-expanded="false" aria-controls="petugascollapse">
                Petugas
            </a>
            <a class="btn btn-primary" data-bs-toggle="collapse" href="#masyarakatcollapse" role="button" aria-expanded="false" aria-controls="masyarakatcollapse">
                Masyarakat
            </a>
            @if (Auth::user()->role === 'admin')
            <a href="{{ route('admin.register') }}" class="btn btn-outline-primary">Register</a>
            @endif
        </p>

        <div class="collapse" id="admincollapse">
            <div class="card card-body">
                <table class="table table-sm table-striped" id="admin">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Username</th>
                            <th scope="col">email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($admin as $a)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $a->name }}</td>
                                <td>{{ $a->username }}</td>
                                <td>{{ $a->email }}</td>
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
        </div>

        <div class="collapse" id="petugascollapse">
            <div class="card card-body">
                <table class="table table-sm table-striped" id="petugas">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Username</th>
                            <th scope="col">email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($petugas as $p)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $p->name }}</td>
                                <td>{{ $p->username }}</td>
                                <td>{{ $p->email }}</td>
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
        </div>

        <div class="collapse" id="masyarakatcollapse">
            <div class="card card-body">
                <table class="table table-sm table-striped" id="masyarakat">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Username</th>
                            <th scope="col">email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($user as $u)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $u->name }}</td>
                                <td>{{ $u->username }}</td>
                                <td>{{ $u->email }}</td>
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
        </div>
        
    </div>
@endsection
@section('script')
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#admin').DataTable();
            $('#petugas').DataTable();
            $('#masyarakat').DataTable();
        } );
    </script>
@endsection