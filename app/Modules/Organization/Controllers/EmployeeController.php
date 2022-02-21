<?php

namespace App\Modules\Organization\Controllers;

use App\Constants\HttpCodes;
use Illuminate\Http\Request;
use App\Modules\CrudController;
use App\Modules\SelectableTrait;
use App\Exceptions\NotFoundException;
use App\Exceptions\ErrorCreateException;
use App\Modules\Organization\Services\EmployeeService;



class EmployeeController extends CrudController 
{

    use SelectableTrait;
    
    protected $service;

    public function __construct(EmployeeService $service, Request $request)
    {
        $this->service = $service;
        parent::__construct($request);
    }


}