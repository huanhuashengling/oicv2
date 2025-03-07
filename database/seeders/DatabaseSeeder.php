<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Teacher;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Course;
use App\Models\Volume;
use App\Models\Unit;
use App\Models\Lesson;
use App\Models\Activity;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Teacher::create([
            'username' => 'test',
            'schools_id' => '1',
            'password' => 'password', // 生成加密后的密码
        ]);

        $course = Course::create([
            'title' => '信息科技',
            'description' => '湖南教育出版社',
        ]);

        // 创建册
        $volumes = [
            ['courses_id' => $course->id, 'grade_code' => 3, 'grade_char' => "三年级", 'semester_code' => 1, 'semester_char' => "上册"], 
            ['courses_id' => $course->id, 'grade_code' => 3, 'grade_char' => "三年级", 'semester_code' => 2, 'semester_char' => "下册"],
            ['courses_id' => $course->id, 'grade_code' => 4, 'grade_char' => "四年级", 'semester_code' => 1, 'semester_char' => "上册"],
            ['courses_id' => $course->id, 'grade_code' => 4, 'grade_char' => "四年级", 'semester_code' => 2, 'semester_char' => "下册"],
            ['courses_id' => $course->id, 'grade_code' => 5, 'grade_char' => "五年级", 'semester_code' => 1, 'semester_char' => "上册"],
            ['courses_id' => $course->id, 'grade_code' => 5, 'grade_char' => "五年级", 'semester_code' => 2, 'semester_char' => "下册"],
            ['courses_id' => $course->id, 'grade_code' => 6, 'grade_char' => "六年级", 'semester_code' => 1, 'semester_char' => "上册"],
            ['courses_id' => $course->id, 'grade_code' => 6, 'grade_char' => "六年级", 'semester_code' => 2, 'semester_char' => "下册"]
        ];
        Volume::insert($volumes); // 批量插入

        // $volumes_id = 1;
        // // 创建单元
        // $unit = Unit::create([
        //     'volumes_id' => $volumes_id,
        //     'title' => 'Unit 1',
        //     'description' => 'Overview of Unit 1',
        //     'sort_order' => 1,
        // ]);

        // // 创建课时
        // $lesson = Lesson::create([
        //     'units_id' => $unit->id,
        //     'title' => 'Lesson 1',
        //     'description' => 'Overview of Lesson 1',
        //     'sort_order' => 1,
        // ]);

        // // 创建活动
        // Activity::create([
        //     'lesson_id' => $lesson->id,
        //     'title' => 'Activity 1',
        //     'type' => 'quiz',
        //     'content' => 'This is a quiz for Lesson 1.',
        //     'sort_order' => 1,
        // ]);
    }
}
