<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Teacher::create(['name' => 'Nguyễn Văn A', 'email' => 'teacherA@example.com', 'phone' => '0123456789']);
        Teacher::create(['name' => 'Trần Thị B', 'email' => 'teacherB@example.com', 'phone' => '0987654321']);
    }
}
