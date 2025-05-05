@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Karyawan</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama Karyawan</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="company_id" class="form-label">Perusahaan</label>
            <select name="company_id" id="company_id" class="form-select" required>
                <option value="">Pilih Perusahaan</option>
                @foreach($companies as $company)
                    <option value="{{ $company->id }}" {{ old('company_id') == $company->id ? 'selected' : '' }}>
                        {{ $company->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="skills" class="form-label">Skill</label>
            <select name="skills[]" id="skills" class="form-select" multiple>
                @foreach($skills as $skill)
                    <option value="{{ $skill->id }}" {{ in_array($skill->id, old('skills', [])) ? 'selected' : '' }}>
                        {{ $skill->name }}
                    </option>
                @endforeach
            </select>
            <small class="text-muted">Tekan Ctrl/Cmd untuk memilih multiple</small>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('employees.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
