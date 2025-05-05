@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Skill</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('skills.update', $skill) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nama Skill</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $skill->name) }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('skills.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
