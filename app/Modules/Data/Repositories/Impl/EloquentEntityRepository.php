<?php

namespace App\Modules\Data\Repositories\Impl;

use App\Modules\Data\Repositories\IEntityRepository;
use App\Modules\Data\Models\Entity;
use App\Modules\EloquentRepository;

class EloquentEntityRepository extends EloquentRepository implements IEntityRepository
{
    public function __construct(Entity $model)
    {
        parent::__construct($model);
    }

    public function getModelName(): string
    {
        return Entity::class;
    }
}