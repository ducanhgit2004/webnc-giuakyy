@extends('layouts.app')

@section('title', 'Grade Details')

@section('content')
    <h1 class="my-4">Grade Details</h1>
    <p><strong>Name:</strong> {{ $grade->name }}</p>
    <p><strong>Description:</strong> {{ $grade->description }}</p>
    <a href="{{ route('grades.index') }}" class="btn btn-secondary">Back</a>
@endsection
