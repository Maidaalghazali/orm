@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-dark mb-4">Tambah Karyawan</h1>

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
        <form action="{{ route('employees.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="form-label">Nama Karyawan</label>
                <input type="text" name="name" class="form-control form-control-lg" id="name" value="{{ old('name') }}" required>
            </div>

            <div class="mb-4">
                <label for="company_id" class="form-label">Perusahaan</label>
                <select name="company_id" id="company_id" class="form-select form-select-lg" required>
                    <option value="">Pilih Perusahaan</option>
                    @foreach($companies as $company)
                        <option value="{{ $company->id }}" {{ old('company_id') == $company->id ? 'selected' : '' }}>
                            {{ $company->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="skills" class="form-label">Skill</label>
                <select name="skills[]" id="skills" class="form-select form-select-lg" multiple>
                    @foreach($skills as $skill)
                        <option value="{{ $skill->id }}" {{ in_array($skill->id, old('skills', [])) ? 'selected' : '' }}>
                            {{ $skill->name }}
                        </option>
                    @endforeach
                </select>
                <small class="text-muted">Tekan Ctrl/Cmd untuk memilih multiple</small>
            </div>

                <button type="submit" class="btn btn-warning btn-lg">Simpan</button>
                <a href="{{ route('employees.index') }}" class="btn btn-secondary btn-lg">Kembali</a>
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

    .form-label {
        color: #34495e;
        font-weight: 500;
    }

    .form-control, .form-select {
        border-radius: 10px;
        padding: 12px;
        border: 1px solid #bdc3c7;
        font-size: 1.1rem;
    }

    .form-control:focus, .form-select:focus {
        border-color: #16a085;
        box-shadow: 0 0 5px rgba(22, 160, 133, 0.5);
    }

    .btn-warning {
        background-color: #f39c12;
        border-color: #f39c12;
        padding: 12px 20px;
        font-size: 1.1rem;
        border-radius: 10px;
    }

    .btn-warning:hover {
        background-color: #e67e22;
        border-color: #e67e22;
    }

    .btn-secondary {
        background-color: #7f8c8d;
        border-color: #7f8c8d;
        padding: 12px 20px;
        font-size: 1.1rem;
        border-radius: 10px;
    }

    .btn-secondary:hover {
        background-color: #95a5a6;
        border-color: #95a5a6;
    }

    .alert-danger {
        background-color: #f2dede;
        color: #a94442;
        border-color: #ebccd1;
        border-radius: 8px;
    }
</style>
