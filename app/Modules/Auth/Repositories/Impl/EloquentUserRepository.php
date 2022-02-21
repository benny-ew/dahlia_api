<?php

namespace App\Modules\Auth\Repositories\Impl;

use App\Modules\Auth\Repositories\IUserRepository;
use App\Modules\Auth\Models\User;
use App\Modules\EloquentRepository;

class EloquentUserRepository extends EloquentRepository implements IUserRepository
{
    
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function getModelName(): string
    {
        return User::class;
    }

    public function findByEmail(string $email)
    {

    }
    
}