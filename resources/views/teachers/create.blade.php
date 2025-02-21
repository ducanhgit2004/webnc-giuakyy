@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>Thêm giáo viên mới</h1>
</section>

<div class="content">
    <div class="card" style="border-radius: 15px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); padding: 20px;">
        <form action="{{ route('teachers.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Tên</label>
                    <input type="text" name="name" class="form-control rounded" placeholder="Nhập tên giáo viên" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control rounded" placeholder="Nhập email" required>
                </div>
                <div class="form-group">
                    <label for="phone">Số điện thoại</label>
                    <input type="text" name="phone" class="form-control rounded" placeholder="Nhập số điện thoại">
                </div>

                <!-- Dropdown Môn học -->
                <div class="form-group">
                    <label for="subjects">Môn học</label>
                    <select name="subjects[]" class="form-control rounded" multiple>
                        @foreach($subjects as $subject)
                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="profile_picture">Ảnh đại diện</label>
                    <input type="file" name="profile_picture" class="form-control rounded">
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Lưu
                </button>
                <a href="{{ route('teachers.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Quay lại
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
