@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Perusahaan</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('companies.update', $company) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nama Perusahaan</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $company->name) }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('companies.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
