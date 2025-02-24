@extends('layouts.app')

@section('content')
<div class="content-header">
    <h1 class="font-weight-bold">Chào mừng!</h1>
</div>

<div class="row mt-4">
    @php
        $cards = [
            ['route' => 'teachers.index', 'count' => $totalTeachers, 'label' => 'Tổng số Giáo viên', 'icon' => 'fas fa-chalkboard-teacher', 'bg' => 'bg-primary'],
            ['route' => 'students.index', 'count' => $totalStudents, 'label' => 'Tổng số Học sinh', 'icon' => 'fas fa-user-graduate', 'bg' => 'bg-teal'],
            ['route' => 'subjects.index', 'count' => $totalSubjects, 'label' => 'Tổng số Môn học', 'icon' => 'fas fa-book', 'bg' => 'bg-purple'],
            ['route' => 'grades.index', 'count' => $totalGrades, 'label' => 'Tổng số Khối', 'icon' => 'fas fa-graduation-cap', 'bg' => 'bg-orange'],
        ];
    @endphp

    @foreach ($cards as $card)
        <div class="col-lg-3 col-md-6 mb-4">
            <a href="{{ route($card['route']) }}" style="text-decoration: none;">
                <div class="card shadow text-white h-100 hover-effect {{ $card['bg'] }}">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h3>{{ $card['count'] }}</h3>
                            <p>{{ $card['label'] }}</p>
                        </div>
                        <i class="{{ $card['icon'] }} fa-3x"></i>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
</div>

<!-- Tin tức -->
<div class="row mt-4">
    <div class="col-12">
        <h4 class="mb-3">Tin tức & Bài viết mới</h4>
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action">
                <h5 class="mb-1">Cách mạng công nghệ trong giáo dục</h5>
                <p class="mb-1">Những xu hướng công nghệ đang thay đổi môi trường học tập hiện đại.</p>
                <small>Cập nhật: 24/02/2025</small>
            </a>
            <a href="#" class="list-group-item list-group-item-action">
                <h5 class="mb-1">Phương pháp học tập hiệu quả</h5>
                <p class="mb-1">Áp dụng các phương pháp học tập tiên tiến để cải thiện kết quả học tập.</p>
                <small>Cập nhật: 22/02/2025</small>
            </a>
            <a href="#" class="list-group-item list-group-item-action">
                <h5 class="mb-1">Ứng dụng AI trong quản lý trường học</h5>
                <p class="mb-1">Tìm hiểu về các giải pháp AI giúp tối ưu hóa quản lý học sinh và giáo viên.</p>
                <small>Cập nhật: 20/02/2025</small>
            </a>
        </div>
    </div>
</div>

<style>
    .bg-teal {
        background-color: red !important;
    }

    .bg-purple {
        background-color: #6f42c1 !important;
    }

    .bg-orange {
        background-color: yellowgreen !important;
    }

    .hover-effect:hover {
        transform: translateY(-5px);
        transition: 0.3s;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }
</style>
@endsection
