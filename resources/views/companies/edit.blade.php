@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-dark mb-4">Edit Perusahaan</h1>

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
        <form action="{{ route('companies.update', $company) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="form-label">Nama Perusahaan</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $company->name) }}" required>
            </div>

                <button type="submit" class="btn btn-warning">Update</button>
                <a href="{{ route('companies.index') }}" class="btn btn-secondary">Kembali</a>
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
        border: 1px solid #ced4da;
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

    .btn-secondary {
        padding: 10px 20px;
        font-size: 1rem;
        border-radius: 8px;
    }

    .alert-danger {
        border-radius: 8px;
        padding: 15px;
        color: #721c24;
        background-color: #f8d7da;
        border-color: #f5c6cb;
    }
</style>
