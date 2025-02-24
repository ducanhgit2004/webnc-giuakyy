<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;

// Chuyển hướng đến dashboard khi đăng nhập thành công
Route::get('/', function () {
    return redirect()->route('dashboard');
})->middleware('auth');

// Trang dashboard yêu cầu đăng nhập
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

// Bảo vệ các route yêu cầu đăng nhập
Route::middleware('auth')->group(function () {
    Route::resource('grades', GradeController::class);
    Route::resource('subjects', SubjectController::class);
    Route::resource('teachers', TeacherController::class);

    // Quản lý học sinh
    Route::put('/students/{student}', [StudentController::class, 'update'])->name('students.update');
    Route::get('/students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');
    Route::get('/students', [StudentController::class, 'index'])->name('students.index');
    Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
    Route::post('/students', [StudentController::class, 'store'])->name('students.store');
    Route::get('/students/{student}', [StudentController::class, 'show'])->name('students.show');
    Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');

    // Quản lý hồ sơ
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Đăng xuất
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

require __DIR__.'/auth.php';
