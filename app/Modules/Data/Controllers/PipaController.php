<?php

namespace App\Modules\Data\Controllers;

use App\Constants\HttpCodes;
use Illuminate\Http\Request;
use App\Modules\CrudController;
use App\Modules\SelectableTrait;
use App\Exceptions\ForbiddenException;
use App\Modules\Data\Services\PipaService;
use Illuminate\Auth\Access\AuthorizationException;


class PipaController extends CrudController 
{
    use SelectableTrait;
    
    protected $service;

    public function __construct(PipaService $service, Request $request)
    {
        $this->service = $service;
        parent::__construct($request);
    }

    
}