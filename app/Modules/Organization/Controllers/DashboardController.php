<?php

namespace App\Modules\Organization\Controllers;

use App\Constants\Roles;
use App\Models\UserInfo;
use App\Constants\HttpCodes;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Exceptions\ForbiddenException;
use Illuminate\Auth\Access\AuthorizationException;
use App\Modules\Organization\Services\DashboardService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class DashboardController extends Controller
{
    use AuthorizesRequests;

    public $request;
    public $service;

    protected $user;
    
    public function __construct(DashboardService $service, Request $request)
    {
        $this->service = $service;
        $this->request = $request;

        $this->user = auth('api')->user(); 

        if ($this->user){
            $this->role = $this->user->getRoleNames();
            $this->isAdmin = $this->role->contains('admin');
    
            $this->setUserInfo();
        }

    }

    private function setUserInfo() : void
    {
        $userInfo = new UserInfo();

        $userInfo->user = $this->user;

        if ($this->user->employee)
        {
            $userInfo->employee = $this->user->employee;
            if ($this->user->employee->company)
            {
                $userInfo->company = $this->user->employee->company;
            }else{
                $userInfo->company = null;
            }
        }else{
            $userInfo->employee = null;
        }
        
        $this->userInfo = $userInfo;
    }

    protected function getUserInfo() : UserInfo
    {
        return $this->userInfo;
    }

    protected function getCompanyId() : ?string
    {
        if ($this->userInfo->company == null) return null;
        return $this->userInfo->company->id;
    }

    protected function getEmployeeId() : ?string
    {
        if ($this->userInfo->employee == null) return null;
        return $this->userInfo->employee->id;
    }

    public function view()
    {
        try {
            $this->user->can('dashboard');
        } catch (AuthorizationException $exception) {
            throw new ForbiddenException();
        }

        $roles = $this->user->getRoleNames();

        if ($roles->contains(Roles::ADMIN) || $roles->contains(Roles::OPERATOR))
        {
            $params['company'] = '';
        } else {
            $params['company'] = $this->getCompanyId();
        }
        
        return response()->json($this->service->view($params), HttpCodes::HTTP_OK);
    }

}
