<?php

namespace Database\Seeders;

use App\Models\SchoolClass;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchoolClassSeeder extends Seeder
{
    private array $classNumber = [1];
    private array $classLetter = ['A', 'B', 'C', 'D'];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->classNumber as $number) {
            foreach ($this->classLetter as $letter) {
                SchoolClass::query()->firstOrCreate(['name' => $number . '-' . $letter]);
            }
        }
    }
}
