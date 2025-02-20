<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Grade;

class StudentController extends Controller
{
    /**
     * Display a listing of the students.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Student::with('grade');

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%");
            });
        }

        $students = $query->paginate(10); // Thêm phân trang
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new student.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grades = Grade::all();
        return view('students.create', compact('grades'));
    }

    /**
     * Store a newly created student in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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
        ]);

        Student::create($request->all());
        return redirect()->route('students.index')->with('success', 'Học sinh đã được thêm thành công!');
    }

    /**
     * Display the specified student.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
   public function show($id)
{
    $student = Student::findOrFail($id);
    return view('students.show', compact('student'));
}


    /**
     * Show the form for editing the specified student.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $grades = Grade::all();
        return view('students.edit', compact('student', 'grades'));
    }

    /**
     * Update the specified student in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
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
        ]);

        $student->update($request->all());
        return redirect()->route('students.index')->with('success', 'Học sinh đã được cập nhật!');
    }

    /**
     * Remove the specified student from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
{
    // Tìm học sinh theo ID, nếu không tìm thấy sẽ trả lỗi 404
    $student = Student::findOrFail($id);

    // Nếu sử dụng SoftDeletes, cần gọi forceDelete() để xóa vĩnh viễn
    $student->forceDelete(); // Xóa vĩnh viễn thay vì delete

    // Quay lại trang danh sách học sinh với thông báo thành công
    return redirect()->route('students.index')->with('success', 'Học sinh đã bị xóa!');
}

    
}
