<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('volumes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('courses_id')->constrained()->onDelete('cascade');
            $table->integer('grade_code'); // 年级，例如 1, 2, 3
            $table->string('grade_char'); // 一年级 二年级 三年级
            $table->integer('semester_code'); // 1，2
            $table->string('semester_char'); // 上册  下册
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('volumes');
    }
};
