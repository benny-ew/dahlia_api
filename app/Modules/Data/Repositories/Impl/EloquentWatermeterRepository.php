<?php

namespace App\Modules\Data\Repositories\Impl;

use App\Modules\Data\Repositories\IWatermeterRepository;
use App\Modules\Data\Models\Watermeter;
use App\Modules\EloquentRepository;

class EloquentWatermeterRepository extends EloquentRepository implements IWatermeterRepository
{
    public function __construct(Watermeter $model)
    {
        parent::__construct($model);
    }

    public function getModelName(): string
    {
        return Watermeter::class;
    }
}