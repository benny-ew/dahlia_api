<?php

namespace App\Modules\Auth\Services;

use Illuminate\Support\Str;
use App\Modules\BaseService;
use App\Modules\Auth\Models\User;
use Illuminate\Support\Facades\Validator;
use App\Modules\Auth\Repositories\IUserRepository;
use App\Modules\Organization\Repositories\IEmployeeRepository;


class UserService extends BaseService
{
    public IUserRepository $repository;
    public IEmployeeRepository $employeeRepository;

    public function __construct(IUserRepository $repository, IEmployeeRepository $employeeRepository)
    {
        $this->repository = $repository;
        $this->employeeRepository = $employeeRepository;
    }

    public function show($id, $params)
    {        
        return $this->repository->get($id, $params);
    }

    public function showAll($params)
    {

        $users = $this->toDataView($this->repository->getAll($params), $params, 'user');
        
        return $users;
    }


    public function create($params)
    {
        $requestData = $params->all();

        $entity = new User($requestData);
        $entity->id =  (string) Str::orderedUuid();

        $validator = Validator::make($entity->toArray(), User::getRules());
        throw_if($validator->fails(), new ErrorCreateException('check parameters', $validator->errors()));
        
        return $this->repository->create($entity);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }
    
    public function changeRole(string $userId, string $operation, string $role)
    {
        $user = $this->repository->get($userId, null);

        return ($operation == 'assign') ? $user->assignRole($role) : $user->removeRole($role);

    }

    public function changeActiveStatus(string $userId, string $operation)
    {
        
        return ($operation == 'activate') 
            ? $this->repository->update($userId,['active'=>true]) 
            : $this->repository->update($userId,['active'=>false]);

    }

    public function changeVerificationStatus(string $userId, string $operation)
    {
        return ($operation == 'verify') 
        ? $this->repository->update($userId,['email_verified_at'=>now()]) 
        : $this->repository->update($userId,['email_verified_at'=>null]);

    }


}