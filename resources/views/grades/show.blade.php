@extends('layouts.app')

@section('title', 'Chi Tiết Khối')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Thông Tin Chi Tiết</h3>
    </div>

    <div class="card-body">
        <p><strong>Tên Khối:</strong> {{ $grade->name }}</p>
        <p><strong>Mô tả:</strong> {{ $grade->description }}</p>
    </div>

    <div class="card-footer">
        <a href="{{ route('grades.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Quay lại
        </a>
    </div>
</div>
@endsection
