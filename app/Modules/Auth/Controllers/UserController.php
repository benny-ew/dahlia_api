<?php

namespace App\Modules\Auth\Controllers;

use App\Constants\HttpCodes;
use Illuminate\Http\Request;
use App\Modules\CrudController;
use App\Exceptions\NotFoundException;
use App\Exceptions\ErrorCreateException;
use App\Modules\Auth\Services\UserService;



class UserController extends CrudController 
{

    protected $service;
    protected $request;

    public function __construct(UserService $service, Request $request)
    {
        $this->service = $service;
        $this->request = $request;

        parent::__construct($request);
    }

    public function create()
    {
        
        try {
            return $this->service->create($this->request);
        } catch (ErrorCreateException $error) {
            abort($error->getCode(), $error->getErrors());
        }
    }

    public function changeRole(string $id, string $operation, string $role)
    {
        return $this->service->changeRole($id, $operation, $role);
    }
    public function changeActiveStatus(string $id, string $operation)
    {
        return $this->service->changeActiveStatus($id, $operation);
    }
    public function changeVerificationStatus(string $id, string $operation)
    {
        return $this->service->changeVerificationStatus($id, $operation);
    }

}