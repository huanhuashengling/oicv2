<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $fillable = ['volumes_id', 'title', 'description', 'sort_order'];

    public function volume()
    {
        return $this->belongsTo(Volume::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class, 'units_id');
    }
}