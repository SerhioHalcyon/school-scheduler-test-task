<?php

namespace App\Http\Controllers;

use App\Models\Bell;
use App\Models\Schedule;
use App\Models\SchoolClass;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    public function __construct()
    {
        //
    }

    public function index()
    {
        DB::table('schedule')->truncate();

        $days = [1, 2, 3, 4, 5];
        $bells = Bell::all();
        $classes = SchoolClass::all();

        $assignedTeachers = [];
        $assignedClasses = [];

        foreach ($days as $day) {
            foreach ($classes as $class) {
                $subjects = $class->subjects;
                $subjectIndex = 0;

                foreach ($bells as $bell) {
                    if ($subjects->isEmpty()) {
                        continue;
                    }

                    $subject = $subjects[$subjectIndex % count($subjects)];
                    $subjectIndex++;

                    $teachers = $subject->teachers;

                    $availableTeachers = $teachers->filter(function ($teacher) use ($day, $bell, $assignedTeachers) {
                        return !isset($assignedTeachers[$day][$bell->id]) || !in_array($teacher->id, $assignedTeachers[$day][$bell->id]);
                    });

                    if ($availableTeachers->isEmpty()) {
                        continue;
                    }

                    $teacher = $availableTeachers->first();

                    if (isset($assignedClasses[$day][$bell->id]) && in_array($class->id, $assignedClasses[$day][$bell->id])) {
                        continue;
                    }

                    $assignedTeachers[$day][$bell->id][] = $teacher->id;
                    $assignedClasses[$day][$bell->id][] = $class->id;

                    DB::table('schedule')->insert([
                        'day' => $day,
                        'bell_id' => $bell->id,
                        'class_id' => $class->id,
                        'subject_id' => $subject->id,
                        'teacher_id' => $teacher->id,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                }
            }
        }

        $schedule = Schedule::with(['bell', 'schoolClass', 'subject', 'teacher'])
            ->orderBy('day')
            ->orderBy('bell_id')
            ->get();
        $schedule = $schedule->groupBy('day');

        return view('schedule', compact('schedule'));
    }
}
