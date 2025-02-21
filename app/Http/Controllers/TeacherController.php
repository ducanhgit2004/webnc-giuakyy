<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    // Hiển thị danh sách giáo viên
    public function index()
    {
        $teachers = Teacher::with('subjects')->get();
        return view('teachers.index', compact('teachers'));
    }

    // Hiển thị form thêm giáo viên
    public function create()
    {
        $subjects = Subject::all();
        return view('teachers.create', compact('subjects'));
    }

    // Lưu thông tin giáo viên
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:teachers',
            'phone' => 'nullable|string|max:20',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'subjects' => 'array'
        ]);

        // Xử lý ảnh hồ sơ nếu có
        $imagePath = null;
        if ($request->hasFile('profile_image')) {
            $imagePath = $request->file('profile_image')->store('teachers', 'public');
        }

        $teacher = Teacher::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'profile_image' => $imagePath,
        ]);

        $teacher->subjects()->attach($request->subjects);

        return redirect()->route('teachers.index')->with('success', 'Thêm giáo viên thành công!');
    }

    // Hiển thị thông tin chi tiết giáo viên
    public function show(Teacher $teacher)
    {
        $teacher->load('subjects');
        return view('teachers.show', compact('teacher'));
    }

    // Hiển thị form chỉnh sửa giáo viên
    public function edit(Teacher $teacher)
    {
        $subjects = Subject::all();
        return view('teachers.edit', compact('teacher', 'subjects'));
    }

    // Cập nhật thông tin giáo viên
    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:teachers,email,' . $teacher->id,
            'phone' => 'nullable|string|max:20',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'subjects' => 'array'
        ]);

        // Xử lý ảnh hồ sơ
        if ($request->hasFile('profile_image')) {
            // Xoá ảnh cũ nếu có
            if ($teacher->profile_image && Storage::exists('public/' . $teacher->profile_image)) {
                Storage::delete('public/' . $teacher->profile_image);
            }

            // Lưu ảnh mới
            $imagePath = $request->file('profile_image')->store('teachers', 'public');
            $teacher->profile_image = $imagePath;
        }

        $teacher->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        $teacher->subjects()->sync($request->subjects);

        return redirect()->route('teachers.index')->with('success', 'Cập nhật giáo viên thành công!');
    }

    // Xóa giáo viên
    public function destroy(Teacher $teacher)
    {
        // Xóa ảnh hồ sơ nếu có
        if ($teacher->profile_image && Storage::exists('public/' . $teacher->profile_image)) {
            Storage::delete('public/' . $teacher->profile_image);
        }

        $teacher->delete();
        return redirect()->route('teachers.index')->with('success', 'Xóa giáo viên thành công!');
    }
}
