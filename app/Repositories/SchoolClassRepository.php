<?php

namespace App\Repositories;

use App\Models\SchoolClass;
use App\Services\Contracts\SchoolClassRepositoryContract;
use Illuminate\Database\Eloquent\Collection;

class SchoolClassRepository extends Repository implements SchoolClassRepositoryContract
{
    public function __construct()
    {
        parent::__construct(SchoolClass::class);
    }

    public function getWithRelation(): Collection
    {
        return $this->modelClass::query()->with(['subjects.teachers'])->get();
    }
}