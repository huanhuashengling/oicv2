<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // 使用 Authenticatable
use Illuminate\Notifications\Notifiable;

class Teacher extends Authenticatable // 继承 Authenticatable
{
    use HasFactory, Notifiable; // 使用 HasFactory 和 Notifiable

    protected $fillable = ['name', 'school_id', 'password']; // 添加 password 字段

    protected $hidden = ['password', 'remember_token']; // 隐藏密码和记住令牌

    // 一个教师属于一个学校
    public function school()
    {
        return $this->belongsTo(School::class);
    }

    // 其他必要的功能，例如设置密码等
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
}