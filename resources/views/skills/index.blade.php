@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Skill</h1>
    <a href="{{ route('skills.create') }}" class="btn btn-primary mb-3">Tambah Skill</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
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
@endsection
