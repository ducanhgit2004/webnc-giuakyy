<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Grade;

class DashboardController extends Controller
{
    public function index()
    {
        // Đếm tổng số giáo viên, học sinh, môn học và khối
        $totalTeachers = Teacher::count();
        $totalStudents = Student::count();
        $totalSubjects = Subject::count();
        $totalGrades = Grade::count();

        // Trả về view dashboard với dữ liệu đã đếm
        return view('dashboard', compact(
            'totalTeachers',
            'totalStudents',
            'totalSubjects',
            'totalGrades'
        ));
        return view('dashboard', compact('totalTeachers', 'totalStudents', 'totalSubjects', 'totalGrades'));
    }
}
