@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-dark mb-4">Edit Skill</h1>

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
        <form action="{{ route('skills.update', $skill) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nama Skill</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $skill->name) }}" required>
            </div>
            <div class="mt-4 d-flex gap-2">
                <button type="submit" class="btn btn-warning">Update</button>
                <a href="{{ route('skills.index') }}" class="btn btn-outline-primary">Kembali</a>
            </div>
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
        color: #fff !important;
    }

    .alert-danger {
        border-radius: 8px;
    }
</style>
