@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Chi tiết môn học</h1>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Thông tin môn học</h3>
                <div class="card-tools">
                    <a href="{{ route('subjects.edit', $subject) }}" class="btn btn-warning">
                        <i class="fas fa-edit"></i> Chỉnh sửa
                    </a>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <td>{{ $subject->id }}</td>
                    </tr>
                    <tr>
                        <th>Tên môn học</th>
                        <td>{{ $subject->name }}</td>
                    </tr>
                    <tr>
                        <th>Mã môn học</th>
                        <td>{{ $subject->code }}</td>
                    </tr>
                    <tr>
                        <th>Số tín chỉ</th>
                        <td>{{ $subject->credits }}</td>
                    </tr>
                    <tr>
                        <th>Mô tả</th>
                        <td>{{ $subject->description }}</td>
                    </tr>
                </table>
            </div>

            <div class="card-footer">
                <a href="{{ route('subjects.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Quay lại
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
