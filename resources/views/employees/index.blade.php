@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Karyawan</h1>
    <a href="{{ route('employees.create') }}" class="btn btn-primary mb-3">Tambah Karyawan</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
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
