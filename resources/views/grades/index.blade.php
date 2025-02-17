@extends('layouts.app')

@section('title', 'Danh sách Khối')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Danh sách Khối</h3>
        <div class="card-tools">
            <a href="{{ route('grades.create') }}" class="btn btn-success">
                <i class="fas fa-plus"></i> Thêm khối mới
            </a>
        </div>
    </div>

    <div class="card-body">
        <!-- Form tìm kiếm -->
        <form method="GET" action="{{ route('grades.index') }}" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Tìm kiếm khối" value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Tìm kiếm</button>
            </div>
        </form>

        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>STT</th>
                    <th>Tên</th>
                    <th>Mô tả</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($grades as $grade)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $grade->name }}</td>
                        <td>{{ $grade->description }}</td>
                        <td>
                            <a href="{{ route('grades.show', $grade->id) }}" class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i> Xem
                            </a>
                            <a href="{{ route('grades.edit', $grade->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Sửa
                            </a>
                            <form action="{{ route('grades.destroy', $grade->id) }}" method="POST" style="display:inline-block;" 
                                  onsubmit="return confirm('Bạn có chắc chắn muốn xóa khối này không?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i> Xóa
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Phân trang -->
        <div class="mt-3">
            {{ $grades->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>
@endsection
