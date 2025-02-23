@extends('layouts.app')

@section('title', 'Chi tiết Học sinh')

@section('content')
<div class="card card-primary card-outline">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title">
            <i class="fas fa-user"></i> Thông tin Học sinh
        </h3>
        <div class="card-tools ml-auto">
            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-sm btn-warning">
                <i class="fas fa-edit"></i> Chỉnh sửa
            </a>
            <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa học sinh này?');">
                    <i class="fas fa-trash"></i> Xóa
                </button>
            </form>
        </div>     
    </div>
    <div class="card-body">
        <div class="text-center mb-3">
            @if ($student->profile_image)
                <img src="{{ secure_asset('storage/' . $student->profile_image) }}" class="rounded-circle" width="120" height="120" alt="Ảnh hồ sơ">
            @else
                <img src="{{ secure_asset('images/default-profile.png') }}" class="rounded-circle" width="120" height="120" alt="Ảnh mặc định">
            @endif
        </div>

        <table class="table table-bordered">
            <tr>
                <th class="bg-light">Họ & Tên</th>
                <td>{{ $student->name }}</td>
            </tr>
            <tr>
                <th class="bg-light">Email</th>
                <td>{{ $student->email ?? 'Chưa cập nhật' }}</td>
            </tr>
            <tr>
                <th class="bg-light">Số điện thoại</th>
                <td>{{ $student->phone ?? 'Chưa cập nhật' }}</td>
            </tr>
            <tr>
                <th class="bg-light">Ngày sinh</th>
                <td>{{ $student->dob ? \Carbon\Carbon::parse($student->dob)->format('d/m/Y') : 'Chưa cập nhật' }}</td>
            </tr>
            <tr>
                <th class="bg-light">Địa chỉ</th>
                <td>{{ $student->address ?? 'Chưa cập nhật' }}</td>
            </tr>
            <tr>
                <th class="bg-light">Khối</th>
                <td><span class="badge bg-info">{{ $student->grade->name }}</span></td>
            </tr>
        </table>
    </div>

    <div class="card-footer">
        <a href="{{ route('students.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Quay lại
        </a>
    </div>
</div>
@endsection
