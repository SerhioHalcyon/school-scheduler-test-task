<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            TeacherSeeder::class,
            SubjectSeeder::class,
            SchoolClassSeeder::class,
            SubjectTeacherSeeder::class,
            ClassSubjectSeeder::class,
            BellSeeder::class,
        ]);
    }
}
