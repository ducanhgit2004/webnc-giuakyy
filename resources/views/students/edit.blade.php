@extends('layouts.app')

@section('title', 'Chỉnh sửa Học Sinh')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Chỉnh sửa Học Sinh</h3>
    </div>

    <div class="card-body">
        <form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Họ & Tên</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $student->name) }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $student->email) }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Số điện thoại</label>
                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', $student->phone) }}">
                @error('phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="dob" class="form-label">Ngày sinh</label>
                <input type="date" class="form-control @error('dob') is-invalid @enderror" id="dob" name="dob" value="{{ old('dob', $student->dob) }}">
                @error('dob')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Địa chỉ</label>
                <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address">{{ old('address', $student->address) }}</textarea>
                @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="grade_id" class="form-label">Khối</label>
                <select class="form-select @error('grade_id') is-invalid @enderror" id="grade_id" name="grade_id" required>
                    @foreach ($grades as $grade)
                        <option value="{{ $grade->id }}" {{ old('grade_id', $student->grade_id) == $grade->id ? 'selected' : '' }}>
                            {{ $grade->name }}
                        </option>
                    @endforeach
                </select>
                @error('grade_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="profile_image" class="form-label">Ảnh hồ sơ</label>
                @if ($student->profile_image)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $student->profile_image) }}" alt="Ảnh hồ sơ" width="100" class="rounded">
                    </div>
                @endif
                <input type="file" class="form-control @error('profile_image') is-invalid @enderror" id="profile_image" name="profile_image">
                @error('profile_image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
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
