@extends('layouts.app')

@section('title', 'Chi tiết Học sinh')

@section('content')
<div class="card card-primary card-outline">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-user"></i> Thông tin Học sinh</h3>
        <div class="card-tools">
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
        <table class="table table-bordered">
            <tr>
                <th class="bg-light">Họ & Tên</th>
                <td>{{ $student->name }}</td>
            </tr>
            <tr>
                <th class="bg-light">Email</th>
                <td>{{ $student->email }}</td>
            </tr>
            <tr>
                <th class="bg-light">Số điện thoại</th>
                <td>{{ $student->phone ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th class="bg-light">Ngày sinh</th>
                <td>{{ $student->dob ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th class="bg-light">Địa chỉ</th>
                <td>{{ $student->address ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th class="bg-light">Khối</th>
                <td><span class="badge badge-info">{{ $student->grade->name }}</span></td>
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
