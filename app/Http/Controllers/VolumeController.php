<?php

namespace App\Http\Controllers;

use App\Models\Volume;
use App\Models\Course;
use Illuminate\Http\Request;

class VolumeController extends Controller
{
    public function index($courseId = 1)
    {
        // $courseId = 1;
        $course = Course::findOrFail($courseId);
        // 获取所有课程
        $volumes = Volume::where('courses_id', $courseId)->get();
        
        // 返回视图并传递课程数据
        return inertia('Volumes/Index', [
            'volumes' => $volumes,
            'course' => $course, // 也可以传递课程ID，如果需要在视图中使用
        ]);
    }
}