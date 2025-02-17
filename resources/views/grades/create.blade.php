@extends('layouts.app')

@section('title', 'Thêm Khối Mới')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Thêm Khối Mới</h3>
    </div>

    <div class="card-body">
        <form action="{{ route('grades.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Tên Khối</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="description">Mô tả</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Lưu lại
                </button>
                <a href="{{ route('grades.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Quay lại
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
