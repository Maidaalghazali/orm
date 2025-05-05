@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="text-dark mb-4">Detail Karyawan</h1>

        <div class="card shadow-lg p-4">
            <div class="card-body">
                <h4 class="card-title mb-3">{{ $employee->name }}</h4>
                <p class="card-text">
                    <strong>Perusahaan:</strong> {{ $employee->company->name }}<br>
                    <strong>Skill:</strong><br>
                    @foreach ($employee->skills as $skill)
                        <span class="badge bg-skill">{{ $skill->name }}</span>
                    @endforeach
                </p>
                <div class="mt-4 d-flex gap-2">
                    <a href="{{ route('employees.edit', $employee) }}" class="btn btn-warning">Edit</a>
                    <a href="{{ route('employees.index') }}" class="btn btn-outline-primary">Kembali</a>
                </div>
            </div>
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

    .badge.bg-skill {
        background-color: #3498db;
        color: #fff;
        font-size: 0.9rem;
        padding: 6px 12px;
        margin: 4px 4px 0 0;
        border-radius: 10px;
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
</style>
