<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    private array $subjects = [
        'Mathematics',
        'Literature',
        'Language Arts',
        'Foreign Language',
        'History',
        'Geography',
        'Biology',
        'Physics',
        'Chemistry',
        'Computer Science',
        'Physical Education',
        'Art',
        'Music',
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->subjects as $subject) {
            Subject::query()->firstOrCreate(['name' => $subject]);
        }
    }
}
