<?php

namespace App\Modules\Organization\Repositories\Impl;

use App\Modules\Organization\Repositories\IEmployeeRepository;
use App\Modules\Organization\Models\Employee;
use App\Modules\EloquentRepository;

class EloquentEmployeeRepository extends EloquentRepository implements IEmployeeRepository
{
    public function __construct(Employee $model)
    {
        parent::__construct($model);
    }

    public function getModelName(): string
    {
        return Employee::class;
    }
}