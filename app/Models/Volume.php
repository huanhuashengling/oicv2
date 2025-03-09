<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Volume extends Model
{
    use HasFactory;

    protected $fillable = ['courses_id', 'grade_code', 'grade_char', 'semester_code', 'semester_char'];

    public function courses()
    {
        return $this->belongsTo(Course::class);
    }

    public function units()
    {
        return $this->hasMany(Unit::class, "volumes_id");
    }
}