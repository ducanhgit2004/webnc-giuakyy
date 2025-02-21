@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>Chỉnh sửa thông tin giáo viên</h1>
    </section>

    <section class="content">
        <div class="box box-primary" style="border-radius: 10px; padding: 20px; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);">
            <form action="{{ route('teachers.update', $teacher->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="box-body">
                    <div class="form-group">
                        <label for="name">Tên</label>
                        <input type="text" name="name" class="form-control" value="{{ $teacher->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ $teacher->email }}" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Số điện thoại</label>
                        <input type="text" name="phone" class="form-control" value="{{ $teacher->phone }}">
                    </div>
                    <div class="form-group">
                        <label for="subjects">Môn học</label>
                        <select name="subjects[]" class="form-control select2" multiple="multiple" style="border-radius: 8px;">
                            @foreach($subjects as $subject)
                                <option value="{{ $subject->id }}" {{ $teacher->subjects->contains($subject->id) ? 'selected' : '' }}>
                                    {{ $subject->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="profile_image">Ảnh hồ sơ</label>
                        <input type="file" name="profile_image" class="form-control">
                        @if ($teacher->profile_image)
                            <img src="{{ asset('storage/' . $teacher->profile_image) }}" alt="Ảnh hồ sơ" width="100" style="margin-top: 10px; border-radius: 8px;">
                        @endif
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
    </section>
@endsection
