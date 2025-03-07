<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = ['lesson_id', 'title', 'type', 'content', 'sort_order'];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}