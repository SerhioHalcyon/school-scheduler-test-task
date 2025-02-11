<?php

namespace App\Services\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface SchoolClassRepositoryContract extends RepositoryContract
{

    public function getWithRelation(): Collection;
}