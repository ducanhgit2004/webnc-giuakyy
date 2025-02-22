@extends('layouts.app')

@section('title', 'Thêm Học Sinh')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Thêm Học Sinh Mới</h3>
    </div>

    <div class="card-body">
        <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Họ & Tên</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Số điện thoại</label>
                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}">
                @error('phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="dob" class="form-label">Ngày sinh</label>
                <input type="date" class="form-control @error('dob') is-invalid @enderror" id="dob" name="dob" value="{{ old('dob') }}">
                @error('dob')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Địa chỉ</label>
                <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address">{{ old('address') }}</textarea>
                @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="grade_id" class="form-label">Khối</label>
                <select class="form-select @error('grade_id') is-invalid @enderror" id="grade_id" name="grade_id" required>
                    <option value="" disabled {{ old('grade_id') ? '' : 'selected' }}>-- Chọn Khối --</option>
                    @foreach ($grades as $grade)
                        <option value="{{ $grade->id }}" {{ old('grade_id') == $grade->id ? 'selected' : '' }}>
                            {{ $grade->name }}
                        </option>
                    @endforeach
                </select>
                @error('grade_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Thêm ảnh đại diện -->
            <div class="mb-3">
                <label for="profile_picture" class="form-label">Ảnh đại diện</label>
                <input type="file" class="form-control @error('profile_image') is-invalid @enderror" id="profile_image" name="profile_picture" onchange="previewImage(event)">
                @error('profile_image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <!-- Hiển thị ảnh xem trước -->
                <div class="mt-3">
                    <img id="imagePreview" src="#" alt="Ảnh xem trước" style="max-width: 200px; display: none;">
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('students.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Quay lại
                </a>
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-plus"></i> Thêm mới
                </button>
            </div>
        </form>
    </div>
</div>

<!-- JavaScript để hiển thị ảnh xem trước -->
<script>
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('imagePreview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection
