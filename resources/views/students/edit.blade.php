@extends('layouts.app')

@section('title', 'Chỉnh sửa Học Sinh')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Chỉnh sửa Học Sinh</h3>
    </div>

    <div class="card-body">
        <form action="{{ route('students.update', $student->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Họ & Tên</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $student->name }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $student->email }}" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Số điện thoại</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ $student->phone }}">
            </div>

            <div class="mb-3">
                <label for="dob" class="form-label">Ngày sinh</label>
                <input type="date" class="form-control" id="dob" name="dob" value="{{ $student->dob }}">
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Địa chỉ</label>
                <textarea class="form-control" id="address" name="address">{{ $student->address }}</textarea>
            </div>

            <div class="mb-3">
                <label for="grade_id" class="form-label">Khối</label>
                <select class="form-select" id="grade_id" name="grade_id" required>
                    @foreach ($grades as $grade)
                        <option value="{{ $grade->id }}" {{ $student->grade_id == $grade->id ? 'selected' : '' }}>
                            {{ $grade->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('students.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Quay lại
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Cập nhật
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
