<?php

namespace App\Modules\Data\Repositories\Impl;

use App\Modules\Data\Repositories\IPelangganRepository;
use App\Modules\Data\Models\Pelanggan;
use App\Modules\EloquentRepository;

class EloquentPelangganRepository extends EloquentRepository implements IPelangganRepository
{
    public function __construct(Pelanggan $model)
    {
        parent::__construct($model);
    }

    public function getModelName(): string
    {
        return Pelanggan::class;
    }
}