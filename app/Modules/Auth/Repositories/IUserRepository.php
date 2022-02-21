<?php

namespace App\Modules\Auth\Repositories;
use App\Modules\IRepository;

interface IUserRepository extends IRepository {
    
    function findByEmail(string $email);

}