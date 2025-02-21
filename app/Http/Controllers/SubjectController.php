<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    // Hiển thị danh sách môn học với tìm kiếm và phân trang
    public function index(Request $request)
    {
        $query = Subject::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('code', 'like', "%{$search}%")
                  ->orWhere('credits', 'like', "%{$search}%");
        }

        $subjects = $query->orderBy('name')->paginate(10);
        return view('subjects.index', compact('subjects'));
    }

    // Hiển thị form thêm môn học
    public function create()
    {
        return view('subjects.create');
    }

    // Lưu thông tin môn học mới
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:50|unique:subjects,code',
            'credits' => 'required|integer|min:1|max:10',
            'description' => 'nullable|string',
        ], [
            'code.unique' => 'Mã môn học đã tồn tại.',
            'credits.min' => 'Số tín chỉ tối thiểu là 1.',
            'credits.max' => 'Số tín chỉ tối đa là 10.',
        ]);

        Subject::create($request->all());

        return redirect()->route('subjects.index')->with('success', 'Môn học đã được thêm thành công!');
    }

    // Hiển thị form chỉnh sửa môn học
    public function edit(Subject $subject)
    {
        return view('subjects.edit', compact('subject'));
    }

    // Cập nhật thông tin môn học
    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:50|unique:subjects,code,' . $subject->id,
            'credits' => 'required|integer|min:1|max:10',
            'description' => 'nullable|string',
        ], [
            'code.unique' => 'Mã môn học đã tồn tại.',
        ]);

        $subject->update($request->all());

        return redirect()->route('subjects.index')->with('success', 'Môn học đã được cập nhật!');
    }

    // Hiển thị thông tin chi tiết môn học
    public function show(Subject $subject)
    {
        return view('subjects.show', compact('subject'));
    }

    // Xóa môn học
    public function destroy(Subject $subject)
    {
        $subject->delete();
        return redirect()->route('subjects.index')->with('success', 'Môn học đã bị xóa!');
    }
}
