<?php

namespace App\Services\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface HasRelationsContract
{
    public function getWithRelation(): Collection;
}