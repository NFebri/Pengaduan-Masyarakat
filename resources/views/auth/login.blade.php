@extends('layout.app')
@section('content')
    <div class="container mt-3">
        <div class="card mx-5">
            <div class="card-header">
                Form Login
            </div>
            <div class="card-body">
                <form action="{{ route('proses.login') }}" method="POST">
                    @csrf
                    @method('POST')
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="mb-3 row">
                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" name="username" class="form-control" id="username" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" name="password" class="form-control" id="password" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">login</button>
                </form>
            </div>
        </div>
    </div>
@endsection