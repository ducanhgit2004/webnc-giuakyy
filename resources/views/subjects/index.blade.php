@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Danh sách môn học</h1>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="card-tools">
                     <!-- Form tìm kiếm -->
                        <form action="{{ route('subjects.index') }}" method="GET">
                            <div class="input-group input-group-sm" style="width: 250px;">
                                <input type="text" name="search" class="form-control" placeholder="Tìm kiếm môn học..." value="{{ request('search') }}">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-search"></i> 
                                </button>
                            </div>
                        </form>
                </div>
            </div>

            <div class="card-body">
                <a href="{{ route('subjects.create') }}" class="btn btn-success mb-3">
                    <i class="fas fa-plus"></i> Thêm môn học
                </a>
               
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Mã</th>
                            <th>Số tín chỉ</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subjects as $subject)
                            <tr>
                                <td>{{ $subject->id }}</td>
                                <td>{{ $subject->name }}</td>
                                <td>{{ $subject->code }}</td>
                                <td>{{ $subject->credits }}</td>
                                <td>
                                    <a href="{{ route('subjects.edit', $subject) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i> Sửa
                                    </a>
                                    <form action="{{ route('subjects.destroy', $subject) }}" method="POST" style="display:inline;">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Xác nhận xóa?')">
                                            <i class="fas fa-trash"></i> Xóa
                                        </button>
                                        <a href="{{ route('subjects.show', $subject) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i> Xem
                                        </a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card-footer">
                {{ $subjects->links() }} <!-- Phân trang -->
            </div>
        </div>
    </div>
</div>
@endsection
