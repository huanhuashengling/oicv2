<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // 使用 Authenticatable
use Illuminate\Notifications\Notifiable;

class Student extends Authenticatable // 继承 Authenticatable
{
    use HasFactory, Notifiable; // 使用 HasFactory 和 Notifiable

    protected $table = 'students';

    protected $fillable = [
        'username',
        'password',
        'gender',
        'display_name',
        'sclasses_id',
    ];
    
    protected $hidden = ['password', 'remember_token']; // 隐藏密码和记住令牌

    // 一个学生属于一个班级
    public function sclass()
    {
        return $this->belongsTo(Sclass::class, 'sclasses_id');
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
}
