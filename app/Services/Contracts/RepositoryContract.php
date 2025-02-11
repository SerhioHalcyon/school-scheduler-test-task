<?php

namespace App\Services\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface RepositoryContract
{
    public function all(): Collection;
}