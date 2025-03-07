<?php
    
namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        // 获取所有课程
        $courses = Course::all();
        
        // 返回视图并传递课程数据
        return inertia('Courses/Index', [
            'courses' => $courses,
        ]);
    }
}