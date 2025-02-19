<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index(Request $request)
{
    $query = Subject::query();

    if ($request->has('search')) {
        $search = $request->input('search');
        $query->where('name', 'like', "%{$search}%")
              ->orWhere('code', 'like', "%{$search}%");
    }

    $subjects = $query->paginate(10);
    return view('subjects.index', compact('subjects'));
}

    

    // Thêm phương thức create() để hiển thị form thêm môn học
    public function create()
    {
        return view('subjects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:50|unique:subjects,code',
            'credits' => 'required|integer|min:1|max:10',
            'description' => 'nullable|string',
        ]);

        Subject::create($request->all());

        return redirect()->route('subjects.index')->with('success', 'Môn học đã được thêm thành công!');
    }


    // Thêm phương thức edit()
    public function edit(Subject $subject)
    {
        return view('subjects.edit', compact('subject'));
    }

    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:50|unique:subjects,code,' . $subject->id,
            'credits' => 'required|integer|min:1|max:10',
            'description' => 'nullable|string',
        ]);

        $subject->update($request->all());

        return redirect()->route('subjects.index')->with('success', 'Môn học đã được cập nhật!');
    }

    public function show(Subject $subject)
    {
        return view('subjects.show', compact('subject'));
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();
        return redirect()->route('subjects.index')->with('success', 'Môn học đã bị xóa!');
    }
}
