<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sclass extends Model
{
    use HasFactory;

    protected $fillable = ['enter_school_year', 'class_title', 'schools_id', 'class_num', 'is_graduated'];

    // 一个学生属于一个学校
    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public $timestamps = true;
}
