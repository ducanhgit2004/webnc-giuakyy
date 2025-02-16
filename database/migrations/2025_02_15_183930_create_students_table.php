<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Tên sinh viên
            $table->string('email')->unique(); // Email
            $table->string('phone')->nullable(); // Số điện thoại
            $table->date('dob')->nullable(); // Ngày sinh
            $table->text('address')->nullable(); // Địa chỉ
            $table->foreignId('grade_id')->constrained('grades')->onDelete('cascade'); // Liên kết với bảng lớp
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
