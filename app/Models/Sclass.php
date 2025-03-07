<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sclass extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'school_id'];

    // 一个学生属于一个学校
    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
