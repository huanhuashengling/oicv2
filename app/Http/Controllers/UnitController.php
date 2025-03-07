<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Volume;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index($volumeId)
    {
        $volume = Volume::findOrFail($volumeId);
        // 获取所有课程
        $units = Unit::with('lessons')
                 ->where('volumes_id', $volumeId)->get();
        // dd($units);
        // 返回视图并传递课程数据
        return inertia('Unit/Index', [
            'volume' => $volume,
            'units' => $units,
        ]);
    }
}
