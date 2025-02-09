<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    private int $teacherCount = 10;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Teacher::query()->count() < $this->teacherCount) {
            Teacher::factory()->count(10)->create();
        }
    }
}
