<?php

namespace App\Modules\Organization\Services;

use Illuminate\Support\Str;
use App\Modules\BaseService;
use App\Exceptions\ErrorCreateException;
use Illuminate\Support\Facades\Validator;
use App\Modules\Organization\Models\Company;
use App\Modules\Organization\Repositories\ICompanyRepository;

class CompanyService extends BaseService
{
    public ICompanyRepository $repository;

    public function __construct(ICompanyRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getCompany($id)
    {
        return $company =  $this->repository->get($id, null); 
    }

    public function show($id, $params)
    {
        $company =  $this->repository->get($id, $params);
        $company->has_logo = $company->hasLogo()[1];
        if ($company->has_logo) $company->logo_url = $company->hasLogo()[0];
        return $company;
    }

    public function showAll($params)
    {
        $users = $this->toDataView($this->repository->getAll($params), $params, 'company');

        return $users;
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }

    public function create($params)
    {
        $requestData = $params->all();

        $entity = new Company($requestData);
        $entity->id =  (string) Str::orderedUuid();

        $validator = Validator::make($entity->toArray(), Company::getRules());

        throw_if($validator->fails(), new ErrorCreateException('check parameters', $validator->errors()));
        
        return $this->repository->create($entity);
    }
}