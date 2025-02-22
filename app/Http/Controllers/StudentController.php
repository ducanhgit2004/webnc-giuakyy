<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Grade;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Display a listing of the students.
     */
    public function index(Request $request)
    {
        $query = Student::with('grade');

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%")
                  ->orWhere('phone', 'like', "%$search%");
            });
        }

        $students = $query->paginate(10);

        // Kiểm tra ảnh đại diện và gán ảnh mặc định nếu chưa có
        foreach ($students as $student) {
            if (!$student->profile_image || !Storage::disk('public')->exists($student->profile_image)) {
                $student->profile_image = 'students/default.png';
            }
        }

        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new student.
     */
    public function create()
    {
        $grades = Grade::all();
        return view('students.create', compact('grades'));
    }

    /**
     * Store a newly created student in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:students',
            'phone' => 'nullable|max:15',
            'dob' => 'nullable|date',
            'address' => 'nullable',
            'grade_id' => 'required|exists:grades,id',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $studentData = $request->all();

        // Xử lý upload ảnh
        if ($request->hasFile('profile_image')) {
            $path = $request->file('profile_image')->store('students', 'public');
            $studentData['profile_image'] = $path;
        } else {
            // Gán ảnh mặc định nếu không upload ảnh
            $studentData['profile_image'] = 'students/default.png';
        }

        Student::create($studentData);
        return redirect()->route('students.index')->with('success', 'Học sinh đã được thêm thành công!');
    }

    /**
     * Display the specified student.
     */
    public function show($id)
    {
        $student = Student::findOrFail($id);
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified student.
     */
    public function edit(Student $student)
    {
        $grades = Grade::all();
        return view('students.edit', compact('student', 'grades'));
    }

    /**
     * Update the specified student in storage.
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'phone' => 'nullable|max:15',
            'dob' => 'nullable|date',
            'address' => 'nullable',
            'grade_id' => 'required|exists:grades,id',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $studentData = $request->all();

        // Xử lý cập nhật ảnh hồ sơ
        if ($request->hasFile('profile_image')) {
            // Xóa ảnh cũ nếu có
            if ($student->profile_image && Storage::disk('public')->exists($student->profile_image)) {
                Storage::disk('public')->delete($student->profile_image);
            }

            // Lưu ảnh mới
            $path = $request->file('profile_image')->store('students', 'public');
            $studentData['profile_image'] = $path;
        }

        $student->update($studentData);
        return redirect()->route('students.index')->with('success', 'Học sinh đã được cập nhật!');
    }

    /**
     * Remove the specified student from storage.
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);

        // Xóa ảnh hồ sơ nếu có
        if ($student->profile_image && Storage::disk('public')->exists($student->profile_image)) {
            Storage::disk('public')->delete($student->profile_image);
        }

        // Xóa học sinh
        $student->forceDelete();

        return redirect()->route('students.index')->with('success', 'Học sinh đã bị xóa!');
    }
}
