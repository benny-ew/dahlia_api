<?php

namespace App\Modules\Auth\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Modules\Auth\Models\User;
use App\Modules\Auth\Permissions\UserPermissions;

class UserPolicy
{
    use HandlesAuthorization;

    //todo: add extra checks. For example: user->id === $requestedItem->owner->id

    public function index(User $user)
    {
        return $user->can(UserPermissions::RETRIEVE_ALL_USERS);
    }

    public function show(User $user, $requestedItem)
    {
        return $user->can(UserPermissions::RETRIEVE_USER);
    }

    public function create(User $user)
    {
        return $user->can(UserPermissions::CREATE_USER);
    }

    public function update(User $user, $requestedItem)
    {
        return $user->can(UserPermissions::UPDATE_USER);
    }

    public function delete(User $user, $requestedItem)
    {
        return $user->can(UserPermissions::DELETE_USER);
    }
}
