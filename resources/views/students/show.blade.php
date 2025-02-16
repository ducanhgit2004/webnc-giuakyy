@extends('layouts.app')

@section('title', 'Student Details')

@section('content')
    <h1 class="my-4">Student Details</h1>
    <p><strong>Name:</strong> {{ $student->name }}</p>
    <p><strong>Email:</strong> {{ $student->email }}</p>
    <p><strong>Phone:</strong> {{ $student->phone }}</p>
    <p><strong>Date of Birth:</strong> {{ $student->dob }}</p>
    <p><strong>Address:</strong> {{ $student->address }}</p>
    <p><strong>Grade:</strong> {{ $student->grade->name }}</p>
    <a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>
@endsection
