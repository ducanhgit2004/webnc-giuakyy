@extends('layouts.app')

@section('title', 'Grades List')

@section('content')
    <h1 class="my-4">Khối</h1>

    <!-- Form tìm kiếm -->
    <form method="GET" action="{{ route('grades.index') }}" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Tìm kiếm khối" value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
        </div>
    </form>

    <a href="{{ route('grades.create') }}" class="btn btn-primary mb-3">Thêm khối mới</a>

    <table class="table table-striped">
        <thead>
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
                        <a href="{{ route('grades.show', $grade->id) }}" class="btn btn-info btn-sm">Xem chi tiết</a>
                        <a href="{{ route('grades.edit', $grade->id) }}" class="btn btn-secondary btn-sm">Chỉnh sửa</a>
                        <form action="{{ route('grades.destroy', $grade->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Phân trang -->
    {{ $grades->links() }}

@endsection
