<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'name',
        'description',
        'goals',
        'steps',
        'resources',
        'order_number',
        'participant_roles',
        'estimated_duration',
        'assessment_criteria',
        'open_strategy',
        'status',
        'priority',
        'related_links',
    ];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}