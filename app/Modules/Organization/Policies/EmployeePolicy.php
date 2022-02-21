<?php

namespace App\Modules\Organization\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Modules\Auth\Models\User;
use App\Modules\Organization\Permissions\EmployeePermissions;

class EmployeePolicy
{
    use HandlesAuthorization;

    //todo: add extra checks. For example: user->id === $requestedItem->owner->id

    public function index(User $user)
    {
        //$company->id
        return ($user->can(EmployeePermissions::RETRIEVE_ALL_EMPLOYEES) || $user->can(EmployeePermissions::RETRIEVE_EMPLOYEE));
    }

    public function show(User $user, $requestedItem)
    {
        return $user->can(EmployeePermissions::RETRIEVE_EMPLOYEE);
    }

    public function create(User $user)
    {
        return $user->can(EmployeePermissions::CREATE_EMPLOYEE);
    }

    public function update(User $user, $requestedItem)
    {
        return $user->can(EmployeePermissions::UPDATE_EMPLOYEE);
    }

    public function delete(User $user, $requestedItem)
    {
        return $user->can(EmployeePermissions::DELETE_EMPLOYEE);
    }
}
