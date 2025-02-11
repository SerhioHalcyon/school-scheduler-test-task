<?php

namespace App\Services\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface ScheduleRepositoryContract extends RepositoryContract, HasRelationsContract
{
    public function truncate(): void;
}