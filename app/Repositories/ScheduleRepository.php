<?php

namespace App\Repositories;

use App\Models\Schedule;
use App\Services\Contracts\ScheduleRepositoryContract;
use Illuminate\Database\Eloquent\Collection;

class ScheduleRepository extends Repository implements ScheduleRepositoryContract
{
    public function __construct()
    {
        parent::__construct(Schedule::class);
    }

    public function getWithRelation(): Collection
    {
        return $this->modelClass::query()
            ->with(['bell', 'schoolClass', 'subject', 'teacher'])
            ->orderBy('day')
            ->orderBy('bell_id')
            ->get();
    }

    public function truncate(): void
    {
        $this->modelClass::query()->truncate();
    }
}