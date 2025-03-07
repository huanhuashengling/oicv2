<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = ['units_id', 'title', 'description', 'sort_order', 'lesson_code'];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }
}