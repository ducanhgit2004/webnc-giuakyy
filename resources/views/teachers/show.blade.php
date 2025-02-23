@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>Chi tiết giáo viên</h1>
    </section>

    <section class="content">
        <div class="box box-info" style="border-radius: 10px; padding: 20px; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);">
            <div class="box-body text-center">
                <!-- Hiển thị ảnh hồ sơ nếu có -->
                @if ($teacher->profile_image)
                    <img src="{{ secure_asset('storage/' . $teacher->profile_image) }}" alt="Ảnh hồ sơ" 
                         class="img-thumbnail" 
                         style="width: 150px; height: 150px; object-fit: cover; border-radius: 50%; margin-bottom: 20px;">
                @else
                    <img src="{{ secure_asset('images/default-profile.png') }}" alt="Ảnh mặc định" 
                         class="img-thumbnail" 
                         style="width: 150px; height: 150px; object-fit: cover; border-radius: 50%; margin-bottom: 20px;">
                @endif

                <p><strong>Tên:</strong> {{ $teacher->name }}</p>
                <p><strong>Email:</strong> {{ $teacher->email }}</p>
                <p><strong>Số điện thoại:</strong> {{ $teacher->phone }}</p>
                <p><strong>Môn phụ trách:</strong>
                    @foreach($teacher->subjects as $subject)
                        <span class="badge badge-info" style="background-color: #007bff; padding: 5px 10px; border-radius: 8px; color: white;">
                            {{ $subject->name }}
                        </span>
                    @endforeach
                </p>
                <div class="card-footer">
                    <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-warning">Chỉnh sửa</a>
                    <a href="{{ route('teachers.index') }}" class="btn btn-secondary">Quay lại</a>
                </div>
            </div>
        </div>
    </section>
@endsection
