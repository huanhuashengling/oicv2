<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Lesson;
use App\Models\Volume;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index($unitId)
    {
        $unit = Unit::findOrFail($unitId);
        // 获取所有课程
        $lessons = Lesson::where('units_id', $unitId)->get();
        
        $volume = Volume::findOrFail($unit->volumes_id);

        // 返回视图并传递课程数据
        return inertia('Unit/Index', [
            'unit' => $unit,
            'lessons' => $lessons,
            'volume' => $volume,
        ]);
    }
}
