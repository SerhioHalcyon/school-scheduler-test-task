<?php

namespace Database\Seeders;

use App\Models\Bell;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BellSeeder extends Seeder
{
    private array $bells = [
        [
            'name' => 'First lesson',
            'start_time' => '08:00:00',
            'end_time' => '08:45:00',
        ],
        [
            'name' => 'Second lesson',
            'start_time' => '08:55:00',
            'end_time' => '09:40:00',
        ],
        [
            'name' => 'Third lesson',
            'start_time' => '09:50:00',
            'end_time' => '10:35:00',
        ],
        [
            'name' => 'Fourth lesson',
            'start_time' => '10:45:00',
            'end_time' => '11:30:00',
        ],
        [
            'name' => 'Fifth lesson',
            'start_time' => '11:40:00',
            'end_time' => '12:25:00',
        ],
        [
            'name' => 'Sixth lesson',
            'start_time' => '12:35:00',
            'end_time' => '13:20:00',
        ],
        [
            'name' => 'Seventh lesson',
            'start_time' => '13:30:00',
            'end_time' => '14:15:00',
        ],
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->bells as $bell) {
            Bell::query()->updateOrCreate(['name' => $bell['name']], $bell);
        }
    }
}
