<?php

namespace App\Modules\Data\Services;

use Illuminate\Support\Str;
use App\Modules\BaseService;
use App\Exceptions\ErrorCreateException;
use Illuminate\Support\Facades\Validator;
use App\Modules\Data\Models\Entity;
use App\Modules\Data\Repositories\IEntityRepository;

class EntityService extends BaseService
{
    public IEntityRepository $repository;

    public function __construct(IEntityRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getEntity($id)
    {
        return $Entity =  $this->repository->get($id, null); 
    }

    public function show($id, $params)
    {
        $Entity =  $this->repository->get($id, $params);
        $Entity->has_logo = $Entity->hasLogo()[1];
        if ($Entity->has_logo) $Entity->logo_url = $Entity->hasLogo()[0];
        return $Entity;
    }

    public function showAll($params)
    {
        $users = $this->toDataView($this->repository->getAll($params), $params, 'Entity');

        return $users;
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }

    public function create($params)
    {
        $requestData = $params->all();

        $entity = new Entity($requestData);
        $entity->id =  (string) Str::orderedUuid();

        $validator = Validator::make($entity->toArray(), Entity::getRules());

        throw_if($validator->fails(), new ErrorCreateException('check parameters', $validator->errors()));
        
        return $this->repository->create($entity);
    }
}