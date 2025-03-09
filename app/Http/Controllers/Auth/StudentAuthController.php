<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class StudentAuthController extends Controller
{
        // 显示登录页面
    public function showLoginForm()
    {
        return Inertia::render('Auth/StudentLogin');
    }

    // 教师登录逻辑
    public function login(Request $request)
    {
        // 表单验证（用户名和密码）
        $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        // 使用用户名而非邮箱进行身份验证
        $student = Student::where('username', $request->username)->first();

        if (!$student || !Hash::check($request->password, $student->password)) {
            return back()->withErrors([
                'username' => 'The provided credentials are incorrect.',
            ]);
        }

        // 登录并重定向
        Auth::guard('student')->login($student);

        return redirect()->route('student.dashboard');
    }

    // 教师退出登录
    public function logout()
    {
        Auth::guard('student')->logout();
        return redirect()->route('student.login');
    }
}
