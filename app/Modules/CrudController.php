<?php

namespace App\Modules;

use App\Constants\Roles;
use App\Models\UserInfo;
use App\Constants\HttpCodes;
use Illuminate\Http\Request;

abstract class CrudController extends BaseController
{

    protected UserInfo $userInfo ;
    protected bool $isAdmin;
    protected $role;
    protected $user;

    public function __construct(Request $request)
    {
        parent::__construct($request);

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

    public function index()
    {        
        try {
        $this->authorizeAction('index', $this->service->getModelName() );
        } catch (AuthorizationException $exception) {
            throw new ForbiddenException();
        }
                
        $this->request->has('with') ? $params['with'] = explode(',',$this->request->with) : $params['with'] = [];        
        $this->request->has('fields') ? $params['fields'] = explode(',',$this->request->fields) : $params['fields'] = [];        
        $this->request->has('orderby') ? $params['orderby'] = explode(',',$this->request->orderby) : $params['orderby'] = [];        
        $this->request->has('paginate') ? $params['paginate'] = $this->request->paginate : $params['paginate'] = [];

        if ($this->request->has('filter')){
            foreach ($this->request->filter as $key => $value)
            {
                $params['filter'][$key] = $value;
            }
        } else {
            $params['filter'] = [];
        }
        
        $roles = $this->user->getRoleNames();

        if ($roles->contains(Roles::ADMIN) || $roles->contains(Roles::OPERATOR))
        {
            $params['company'] = [];
        } else {
            $params['company'] = $this->getCompanyId();
        }

        $params['url']=$this->request->url();

        if ($params['paginate'])
        {
            return $this->returnOkWithPagination($this->service->showAll($params));
        }

        return $this->returnOk($this->service->showAll($params));
    }

    public function show(string $id){

        $params['url']=$this->request->url();
        $this->request->has('with') ? $params['with'] = explode(',',$this->request->with) : $params['with'] = [];        
        $this->request->has('fields') ? $params['fields'] = explode(',',$this->request->fields) : $params['fields'] = [];
        
        
        $item = $this->service->show($id, $params);
        

        try {
            $this->authorizeAction('show', $item );
        } catch (AuthorizationException $exception) {
            throw new ForbiddenException();
        }

        return $this->returnOk($item);

    }

    public function create()
    {
        try {
            $this->authorizeAction('create', $this->service->getModelName() );
        } catch (AuthorizationException $exception) {
            throw new ForbiddenException();
        } 
        
        try {
            return $this->returnOk($this->service->create($this->request), HttpCodes::HTTP_CREATED);
        } catch (ErrorCreateException $error) {
            return $this->returnError($error->getErrors());
            //abort($error->getCode(), $error->getErrors());
        }
    }

    public function delete(string $id)
    {
        
        try {
            $item = $this->service->find($id);
            $this->authorizeAction('delete', $item);
        } catch (AuthorizationException $exception) {
            throw new ForbiddenException();
        }
        return $this->service->delete($id);
    }
    
    public function update()
    {       
        try {
            $this->authorizeAction('create', $this->service->getModelName() );
        } catch (AuthorizationException $exception) {
            throw new ForbiddenException();
        }
        
        try {
            return $this->service->update($this->request);
        } catch (ErrorCreateException $error) {
            abort($error->getCode(), $error->getErrors());
        }

    }

     
}