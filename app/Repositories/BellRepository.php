<?php

namespace App\Repositories;

use App\Models\Bell;
use App\Services\Contracts\BellRepositoryContract;
use Illuminate\Database\Eloquent\Collection;

class BellRepository extends Repository implements BellRepositoryContract
{
    public function __construct()
    {
        parent::__construct(Bell::class);
    }
}