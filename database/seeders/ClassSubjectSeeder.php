<?php

namespace Database\Seeders;

use App\Models\SchoolClass;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassSubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classes = SchoolClass::all();
        $subject = Subject::all();

        if ($classes->count() == 0 || $subject->count() == 0) {
            return;
        }

        foreach ($classes as $class) {
            $class
                ->subjects()
                ->toggle($subject->random(6)->pluck('id')->toArray());
        }
    }
}
