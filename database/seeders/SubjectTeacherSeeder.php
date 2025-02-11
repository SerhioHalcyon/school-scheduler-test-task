<?php

namespace Database\Seeders;

use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectTeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teachers = Teacher::all();
        $subject = Subject::all();

        if ($teachers->count() == 0 || $subject->count() == 0) {
            return;
        }

        foreach ($teachers as $teacher) {
            $teacher
                ->subjects()
                ->toggle($subject->random(3)->pluck('id')->toArray());
        }
    }
}
