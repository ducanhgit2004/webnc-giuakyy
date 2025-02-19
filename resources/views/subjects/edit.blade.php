@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Chỉnh sửa môn học</h1>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Cập nhật thông tin môn học</h3>
            </div>

            <form action="{{ route('subjects.update', $subject) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="card-body">
                    <div class="form-group">
                        <label>Tên môn học</label>
                        <input type="text" name="name" class="form-control" value="{{ $subject->name }}" required>
                    </div>

                    <div class="form-group">
                        <label>Mã môn học</label>
                        <input type="text" name="code" class="form-control" value="{{ $subject->code }}" required>
                    </div>

                    <div class="form-group">
                        <label>Số tín chỉ</label>
                        <input type="number" name="credits" class="form-control" value="{{ $subject->credits }}" required>
                    </div>

                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea name="description" class="form-control">{{ $subject->description }}</textarea>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Cập nhật
                    </button>
                    <a href="{{ route('subjects.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Quay lại
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
