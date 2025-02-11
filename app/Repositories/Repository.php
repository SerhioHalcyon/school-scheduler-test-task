<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class Repository
{
    public function __construct(
        protected string $modelClass
    ) {
        //
    }

    public function all(): Collection
    {
        return $this->modelClass::all();
    }

    public function create(array $data): Model
    {
        $model = new $this->modelClass;
        $model->fill($data);
        $model->save();
        $model->fresh();

        return $model;
    }
}