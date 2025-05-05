@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="text-dark mb-4">Tambah Skill</h1>

        @if ($errors->any())
            <div class="alert alert-danger mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card shadow-lg p-4">
            <form action="{{ route('skills.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="form-label">Nama Skill</label>
                    <input type="text" name="name" class="form-control form-control-lg" id="name"
                        value="{{ old('name') }}" required>
                </div>

                <button type="submit" class="btn btn-primary btn-lg">Simpan</button>
                <a href="{{ route('skills.index') }}" class="btn btn-outline-primary btn-lg">Kembali</a>

            </form>
        </div>
    </div>
@endsection

<style>
    /* Menambahkan gaya untuk card dan form */
    .card {
        background-color: #fff;
        border-radius: 12px;
        border: none;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .form-control-lg {
        font-size: 1.2rem;
        padding: 10px 15px;
    }

    .btn-lg {
        padding: 12px 20px;
        font-size: 1.1rem;
        border-radius: 10px;
    }

    .btn-primary {
        background-color: #f39c12 !important;
        border-color: #f39c12 !important;
    }

    .btn-primary:hover {
        background-color: #e67e22 !important;
        border-color: #e67e22 !important;
    }

    .btn-outline-primary {
        border-color: #f39c12 !important;
        color: #f39c12 !important;
    }

    .btn-outline-primary:hover {
        background-color: #f39c12 !important;
        color: #fff !important;
    }

    .alert-danger {
        background-color: #f8d7da;
        border-color: #f5c6cb;
        border-radius: 8px;
        color: #721c24;
    }
</style>
