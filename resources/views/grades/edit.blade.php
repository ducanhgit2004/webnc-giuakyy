@extends('layouts.app')

@section('title', 'Edit Grade')

@section('content')
    <h1 class="my-4">Edit Grade</h1>
    <form action="{{ route('grades.update', $grade->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Grade Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $grade->name }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description">{{ $grade->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('grades.index') }}" class="btn btn-secondary">Back</a>
    </form>
@endsection
