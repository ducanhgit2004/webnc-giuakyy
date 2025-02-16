@extends('layouts.app')

@section('title', 'Create Grade')

@section('content')
    <h1 class="my-4">Create New Grade</h1>
    <form action="{{ route('grades.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Grade Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('grades.index') }}" class="btn btn-secondary">Back</a>
    </form>
@endsection
