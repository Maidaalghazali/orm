@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-dark mb-4">Tambah Perusahaan</h1>

    @if ($errors->any())
        <div class="alert alert-danger mb-4">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-lg p-4">
        <form action="{{ route('companies.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="form-label">Nama Perusahaan</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
            </div>

                <button type="submit" class="btn btn-warning">Simpan</button>
                <a href="{{ route('companies.index') }}" class="btn btn-outline-primary">Kembali</a>
        </form>
    </div>
</div>
@endsection

<style>
    .card {
        background-color: #fff;
        border-radius: 12px;
        border: none;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .form-label {
        font-weight: 500;
        color: #34495e;
    }

    .form-control {
        padding: 10px 12px;
        font-size: 1.05rem;
        border-radius: 8px;
        border: 1px solid #ffffff;
    }

    .btn-warning {
        background-color: #f39c12;
        border-color: #f39c12;
        padding: 10px 20px;
        font-size: 1rem;
        border-radius: 8px;
    }

    .btn-warning:hover {
        background-color: #e67e22;
        border-color: #e67e22;
    }

    .btn-outline-primary {
        border-color: #f39c12 !important;
        color: #f39c12 !important;
    }

    .btn-outline-primary:hover {
        background-color: #f39c12 !important;
        color: #ffffff !important;
    }

    .alert-danger {
        border-radius: 8px;
        padding: 15px;
        color: #721c24;
        background-color: #f8d7da;
        border-color: #f5c6cb;
    }
</style>
