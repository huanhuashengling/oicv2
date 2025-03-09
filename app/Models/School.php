<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // 使用 Authenticatable
use Illuminate\Notifications\Notifiable;

class School extends Authenticatable // 继承 Authenticatable
{
    use HasFactory, Notifiable; // 使用 HasFactory 和 Notifiable

    protected $table = 'schools';

    protected $fillable = [
        'username',
        'password',
        'display_name',
        'districts_id',
        'description',
        'code',
        'title',
    ];

    // 一个教师属于一个学校
    public function district()
    {
        return $this->belongsTo(District::class);
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public $timestamps = true;

    // 其他必要的功能，例如设置密码等
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
}
