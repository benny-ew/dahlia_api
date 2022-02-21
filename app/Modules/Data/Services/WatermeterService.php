<?php

namespace App\Modules\Data\Services;

use Illuminate\Support\Str;
use App\Modules\BaseService;
use App\Exceptions\ErrorCreateException;
use Illuminate\Support\Facades\Validator;
use App\Modules\Data\Models\Watermeter;
use App\Modules\Data\Repositories\IWatermeterRepository;

class WatermeterService extends BaseService
{
    public IWatermeterRepository $repository;

    public function __construct(IWatermeterRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getPipa($id)
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
        $users = $this->toDataView($this->repository->getAll($params), $params, 'watermeter');

        return $users;
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }

    public function create($params)
    {
        $requestData = $params->all();

        $entity = new Watermeter($requestData);
        $entity->id =  (string) Str::orderedUuid();

        $validator = Validator::make($entity->toArray(), Watermeter::getRules());

        throw_if($validator->fails(), new ErrorCreateException('check parameters', $validator->errors()));
        
        return $this->repository->create($entity);
    }
}