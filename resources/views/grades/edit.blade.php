@extends('layouts.app')

@section('title', 'Chỉnh sửa Khối')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Chỉnh sửa Khối</h3>
    </div>

    <div class="card-body">
        <form action="{{ route('grades.update', $grade->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Tên Khối</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $grade->name }}" required>
            </div>

            <div class="form-group">
                <label for="description">Mô tả</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ $grade->description }}</textarea>
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Cập nhật
                </button>
                <a href="{{ route('grades.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Quay lại
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
