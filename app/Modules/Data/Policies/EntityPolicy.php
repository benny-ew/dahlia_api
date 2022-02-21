<?php

namespace App\Modules\Data\Policies;

use App\Constants\Roles;
use App\Modules\Auth\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Modules\Data\Permissions\EntityPermissions;

class EntityPolicy
{
    use HandlesAuthorization;

    //TODO: add extra checks. For example: user->id === $requestedItem->owner->id

    public function index(User $user)
    {
        return $user->can(EntityPermissions::RETRIEVE_ALL_ENTITIES);
    }

    public function show(User $user, $requestedItem)
    {        
        if (!$user->can(EntityPermissions::RETRIEVE_ENTITY))
            return false;

        $roles = $user->getRoleNames();

        if ($roles->contains(Roles::ADMIN) || $roles->contains(Roles::OPERATOR))
        {
            return true;
        } else {
            if ($requestedItem->id == $user->getEntityId()){
                return true;
            }else{
                return false;
            } 
        }
    }

    public function create(User $user)
    {
        return $user->can(EntityPermissions::CREATE_ENTITY);
    }

    public function update(User $user, $requestedItem)
    {
        return $user->can(EntityPermissions::UPDATE_ENTITY);
    }

    public function delete(User $user, $requestedItem)
    {
        return $user->can(EntityPermissions::DELETE_ENTITY);
    }

    public function upload(User $user, $requestedItem)
    {
        
        
        // if ($user->getEntityId() == $requestedItem->id)
        //     return true;

        $roles = $user->getRoleNames();

        if ($roles->contains(Roles::ADMIN) || $roles->contains(Roles::OPERATOR))
        {
            return true;
        } else {
            if ($requestedItem->id == $user->getEntityId()){
                return true;
            }else{
                return false;
            } 
        }

        return false;
    }

}
