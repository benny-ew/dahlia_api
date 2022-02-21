<?php

namespace App\Modules\Organization\Repositories\Impl;

use App\Modules\Organization\Repositories\ICompanyRepository;
use App\Modules\Organization\Models\Company;
use App\Modules\EloquentRepository;

class EloquentCompanyRepository extends EloquentRepository implements ICompanyRepository
{
    public function __construct(Company $model)
    {
        parent::__construct($model);
    }

    public function getModelName(): string
    {
        return Company::class;
    }
}