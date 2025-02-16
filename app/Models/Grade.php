<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $table = 'grades';

    protected $fillable = [
        'name',  // Tên lớp
        'description', // Mô tả lớp
    ];

    // Quan hệ: Một lớp có nhiều sinh viên
    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
