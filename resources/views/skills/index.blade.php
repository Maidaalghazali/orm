@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-dark mb-4">Daftar Skill</h1>

    <a href="{{ route('skills.create') }}" class="btn btn-warning btn-lg mb-4">Tambah Skill</a>

    @if(session('success'))
        <div class="alert alert-success mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-lg p-4">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Skill</th>
                    <th>Jumlah Pegawai</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($skills as $skill)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $skill->name }}</td>
                        <td>{{ $skill->employees_count }}</td>
                        <td>
                            <a href="{{ route('skills.edit', $skill) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('skills.destroy', $skill) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Belum ada skill.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

<style>
    /* Menambahkan gaya untuk card dan tabel */
    .card {
        background-color: #fff;
        border-radius: 12px;
        border: none;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .table {
        font-size: 1.1rem;
        border-collapse: separate;
        border-spacing: 0 15px;
    }

    .table th, .table td {
        padding: 12px 15px;
        vertical-align: middle;
    }

    .table th {
        background-color: #f8f9fa;
        color: #34495e;
        font-weight: 500;
    }

    .table tbody tr:hover {
        background-color: #f1f1f1;
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

    .btn-danger {
        background-color: #e74c3c;
        border-color: #e74c3c;
        padding: 10px 15px;
        font-size: 1rem;
        border-radius: 8px;
    }

    .btn-danger:hover {
        background-color: #c0392b;
        border-color: #c0392b;
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border-color: #c3e6cb;
        border-radius: 8px;
    }
</style>
