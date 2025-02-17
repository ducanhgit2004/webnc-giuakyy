<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\StudentController;


// Bảo vệ route courses, yêu cầu đăng nhập trước khi truy cập
Route::middleware('auth')->group(function () {
    Route::resource('grades', GradeController::class);
});

Route::get('/', function () {
    return redirect()->route('grades.index'); 
})->middleware('auth'); // Chỉ cho phép truy cập nếu đã đăng nhập

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::put('/students/{student}', [StudentController::class, 'update'])->name('students.update');
Route::get('/students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');

Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::post('/students', [StudentController::class, 'store'])->name('students.store');
Route::get('/students/{student}', [StudentController::class, 'show'])->name('students.show');
Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');



Route::middleware('auth')->group(function () {
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';