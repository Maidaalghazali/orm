@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Karyawan</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $employee->name }}</h5>
            <p class="card-text">
                <strong>Perusahaan:</strong> {{ $employee->company->name }}<br>
                <strong>Skill:</strong>
                @foreach($employee->skills as $skill)
                    <span class="badge bg-primary">{{ $skill->name }}</span>
                @endforeach
            </p>
            <a href="{{ route('employees.edit', $employee) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('employees.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
