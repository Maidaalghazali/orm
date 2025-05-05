@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-dark">Daftar Karyawan</h1>
    <a href="{{ route('employees.create') }}" class="btn btn-warning mb-3">Tambah Karyawan</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="bg-dark text-light">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Perusahaan</th>
                <th>Skill</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($employees as $employee)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->company->name }}</td>
                    <td>
                        @foreach($employee->skills as $skill)
                            <span class="badge bg-secondary">{{ $skill->name }}</span>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('employees.show', $employee) }}" class="btn btn-info btn-sm">Detail</a>
                        <a href="{{ route('employees.edit', $employee) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('employees.destroy', $employee) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus karyawan?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Belum ada karyawan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

<style>
    /* Menyesuaikan tombol dengan tema */
    .btn-warning {
        background-color: #f39c12;
        border-color: #f39c12;
    }
    .btn-warning:hover {
        background-color: #e67e22;
        border-color: #e67e22;
    }

    .btn-info {
        background-color: #16a085;
        border-color: #16a085;
    }
    .btn-info:hover {
        background-color: #1abc9c;
        border-color: #1abc9c;
    }

    .btn-danger {
        background-color: #c0392b;
        border-color: #c0392b;
    }
    .btn-danger:hover {
        background-color: #e74c3c;
        border-color: #e74c3c;
    }

    /* Tabel Styling */
    table {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    th {
        background-color: #2c3e50;
        color: #fff;
        text-align: center;
    }
    td {
        text-align: center;
    }
    .table-bordered {
        border: 1px solid #bdc3c7;
    }
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #ecf0f1;
    }
</style>
