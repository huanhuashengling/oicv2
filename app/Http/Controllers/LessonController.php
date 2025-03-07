<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function index()
    {
        // 获取所有课程
        $lessons = Lesson::all();
        
        // 返回视图并传递课程数据
        return inertia('Lesson/Index', [
            'lessons' => $lessons,
        ]);
    }
}
