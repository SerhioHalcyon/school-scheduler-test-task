<?php

namespace App\Services\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface ScheduleRepositoryContract extends RepositoryContract
{

    public function getWithRelation(): Collection;
    public function truncate(): void;
}