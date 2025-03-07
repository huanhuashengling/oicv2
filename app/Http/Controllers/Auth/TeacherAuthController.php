<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class TeacherAuthController extends Controller
{
    // 显示登录页面
    public function showLoginForm()
    {
        return Inertia::render('Auth/TeacherLogin');
    }

    // 教师登录逻辑
    public function login(Request $request)
    {

        \Log::info($request->all());

        // 表单验证（用户名和密码）
        $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        // 使用用户名而非邮箱进行身份验证
        $teacher = Teacher::where('username', $request->username)->first();
        \Log::info($teacher->password);
        \Log::info(Hash::make('password'));
        if (!$teacher || !Hash::check($request->password, $teacher->password)) {
            return back()->withErrors([
                'username' => 'The provided credentials are incorrect.',
            ]);
        }

        // 登录并重定向
        Auth::guard('teacher')->login($teacher);

        return redirect()->route('teacher.dashboard');
    }

    // 教师退出登录
    public function logout()
    {
        Auth::guard('teacher')->logout();
        return redirect()->route('teacher.login');
    }
}
