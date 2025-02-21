<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // protected $table = 'students';

    protected $fillable = [
        'name',        // Tên sinh viên
        'email',       // Email
        'phone',       // Số điện thoại
        'dob',         // Ngày sinh
        'address',     // Địa chỉ
        'grade_id',    // ID lớp
        'profile_image'// Ảnh đại dine
    ];

    // Quan hệ: Một sinh viên thuộc về một lớp
    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
}
