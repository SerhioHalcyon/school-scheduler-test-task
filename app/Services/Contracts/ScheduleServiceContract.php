<?php

namespace App\Services\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface ScheduleServiceContract
{
    public function generateSchedule(): Collection;
}