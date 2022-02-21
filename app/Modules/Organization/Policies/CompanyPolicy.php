<?php

namespace App\Modules\Organization\Policies;

use App\Constants\Roles;
use App\Modules\Auth\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Modules\Organization\Permissions\CompanyPermissions;

class CompanyPolicy
{
    use HandlesAuthorization;

    //TODO: add extra checks. For example: user->id === $requestedItem->owner->id

    public function index(User $user)
    {
        return $user->can(CompanyPermissions::RETRIEVE_ALL_COMPANIES);
    }

    public function show(User $user, $requestedItem)
    {        
        if (!$user->can(CompanyPermissions::RETRIEVE_COMPANY))
            return false;

        $roles = $user->getRoleNames();

        if ($roles->contains(Roles::ADMIN) || $roles->contains(Roles::OPERATOR))
        {
            return true;
        } else {
            if ($requestedItem->id == $user->getCompanyId()){
                return true;
            }else{
                return false;
            } 
        }
    }

    public function create(User $user)
    {
        return $user->can(CompanyPermissions::CREATE_COMPANY);
    }

    public function update(User $user, $requestedItem)
    {
        return $user->can(CompanyPermissions::UPDATE_COMPANY);
    }

    public function delete(User $user, $requestedItem)
    {
        return $user->can(CompanyPermissions::DELETE_COMPANY);
    }

    public function upload(User $user, $requestedItem)
    {
        
        
        // if ($user->getCompanyId() == $requestedItem->id)
        //     return true;

        $roles = $user->getRoleNames();

        if ($roles->contains(Roles::ADMIN) || $roles->contains(Roles::OPERATOR))
        {
            return true;
        } else {
            if ($requestedItem->id == $user->getCompanyId()){
                return true;
            }else{
                return false;
            } 
        }

        return false;
    }

}
