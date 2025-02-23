@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Danh sách giáo viên</h1>
            </div>
        </div>
    </div>
</div>

<section class="content mt-3">
    <div class="card">
        <div class="card-header">
            <div class="card-tools">
                <!-- Form tìm kiếm -->
                <form action="{{ route('teachers.index') }}" method="GET">
                    <div class="input-group input-group-sm" style="width: 250px;">
                        <input type="text" name="search" class="form-control" placeholder="Tìm kiếm giáo viên..." value="{{ request('search') }}">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card-body">
            <a href="{{ route('teachers.create') }}" class="btn btn-success mb-3">
                <i class="fas fa-plus"></i> Thêm giáo viên
            </a>

            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Ảnh</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Môn phụ trách</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($teachers as $teacher)
                    <tr>
                        <td>{{ $teacher->id }}</td>
                        <td>
                            <img src="{{ secure_asset('storage/' . $teacher->profile_image) }}" alt="Ảnh giáo viên" width="30px" height="30px">
                        </td>
                        <td>{{ $teacher->name }}</td>
                        <td>{{ $teacher->email }}</td>
                        <td>{{ $teacher->phone }}</td>
                        <td>
                            @foreach($teacher->subjects as $subject)
                                <span class="badge bg-info">{{ $subject->name }}</span>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('teachers.show', $teacher->id) }}" class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i> Xem
                            </a>
                            <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Sửa
                            </a>
                            <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa giáo viên này?')">
                                    <i class="fas fa-trash"></i> Xóa
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">Không tìm thấy giáo viên nào</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Phân trang -->
            <div class="d-flex justify-content-end mt-3">
                {{ $teachers->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</section>

<!-- CSS tùy chỉnh cho phân trang -->
<style>
    .pagination .page-item.active .page-link {
        background-color: #007bff;
        border-color: #007bff;
        color: white;
    }

    .pagination .page-link {
        color: #007bff;
    }

    .pagination .page-link:hover {
        background-color: #e9ecef;
        color: #0056b3;
    }
</style>
@endsection
