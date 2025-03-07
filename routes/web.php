<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\VolumeController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\LessonController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware('auth:teacher')->group(function () {
    Route::get('teacher/dashboard', function () {
        return Inertia::render('Teacher/Dashboard');
    })->name('teacher.dashboard');
    Route::get('courses', [CourseController::class, 'index'])->name('courses.index');
    Route::get('volumes', [VolumeController::class, 'index'])->name('volumes.index');
    // Route::get('volumes/{courseId}', [VolumeController::class, 'index'])->name('volumes.index');
    Route::get('units/{volumeId}', [UnitController::class, 'index'])->name('units.index');
    Route::get('lessons/{unitId}', [LessonController::class, 'index'])->name('lessons.index');
    Route::get('lessons/{volumeId}', [UnitController::class, 'index'])->name('units.index');
});

require __DIR__.'/auth.php';
