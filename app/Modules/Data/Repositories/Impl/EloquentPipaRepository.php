<?php

namespace App\Modules\Data\Repositories\Impl;

use App\Modules\Data\Repositories\IPipaRepository;
use App\Modules\Data\Models\Pipa;
use App\Modules\EloquentRepository;

class EloquentPipaRepository extends EloquentRepository implements IPipaRepository
{
    public function __construct(Pipa $model)
    {
        parent::__construct($model);
    }

    public function getModelName(): string
    {
        return Pipa::class;
    }
}