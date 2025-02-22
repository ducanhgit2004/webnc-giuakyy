@extends('layouts.app')

@section('title', 'Danh sách Học Sinh')

@section('content')

<!-- Thêm Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTTXRM2R2Yl5dFfG5n9N4Qh8RO3f3nL1O8xQ7lG6X3IqX3VJ2Cg1q6pGk6CzE3cEGBuC1U9Szw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Danh sách học sinh</h1>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <div class="card-tools">
            <form method="GET" action="{{ route('students.index') }}">
                <div class="input-group input-group-sm" style="width: 250px;">
                    <input type="text" name="search" class="form-control" placeholder="Tìm kiếm học sinh..." value="{{ request('search') }}">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card-body">
        <a href="{{ route('students.create') }}" class="btn btn-success mb-3">
            <i class="fas fa-plus"></i> Thêm Học Sinh
        </a>

        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Ảnh</th>
                    <th>Họ & Tên</th>
                    <th>Email</th>
                    <th>Điện Thoại</th>
                    <th>Ngày sinh</th>
                    <th>Địa chỉ</th>
                    <th>Khối</th>
                    <th class="text-center">Hành Động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $student->profile_image) }}" alt="Ảnh đại diện" style="width: 30px; height: 30px; object-fit: cover;">
                        </td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->phone }}</td>
                        <td>{{ $student->dob }}</td>
                        <td>{{ $student->address }}</td>
                        <td>{{ $student->grade ? $student->grade->name : 'Chưa có khối' }}</td>
                        <td class="text-center">
                            <a href="{{ route('students.show', $student->id) }}" class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i> Xem
                            </a>
                            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Sửa
                            </a>
                            <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                    <i class="fas fa-trash"></i> Xóa
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer d-flex justify-content-end">
        {{ $students->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection
