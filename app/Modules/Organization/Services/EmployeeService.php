<?php

namespace App\Modules\Organization\Services;

use Illuminate\Support\Str;
use App\Modules\BaseService;
use App\Modules\Auth\Models\User;
use App\Exceptions\ErrorCreateException;
use Illuminate\Support\Facades\Validator;
use App\Modules\Organization\Models\Company;
use App\Modules\Organization\Models\Employee;
use App\Modules\Organization\Repositories\IEmployeeRepository;


class EmployeeService extends BaseService
{
    public IEmployeeRepository $repository;

    public function __construct(IEmployeeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function show($id, $params)
    {
        return $this->repository->get($id, $params);
    }

    public function showAll($params)
    {
        $users = $this->toDataView($this->repository->getAll($params), $params, 'employee');

        return $users;
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }

    public function create($params)
    {
        $requestData = $params->all();

        $entity = new Employee($requestData);

        throw_if(($params->missing('email') && $params->missing('user_id')), new ErrorCreateException('company code does not exist', 'company code does not exist'));
        if ($params->has('email')) {
            $user = User::where('email', $requestData['email'])->first();
            $entity->user_id = $user->id;
        }
        
        throw_if(($params->missing('company_code') && $params->missing('company_id')), new ErrorCreateException('company code does not exist', 'company code does not exist'));
        if ($params->has('company_code')) {
            $company = Company::where('code', $requestData['company_code'])->first();
            $entity->company_id = $company->id;
        }
        
        $entity->id = (string) Str::orderedUuid();
        $validator = Validator::make($entity->toArray(), Employee::getRules());

        throw_if($validator->fails(), new ErrorCreateException('check parameters', $validator->errors()));
        
        return $this->repository->create($entity);
    }

}