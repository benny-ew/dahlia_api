<?php

namespace App\Modules\Organization\Controllers;

use App\Constants\HttpCodes;
use Illuminate\Http\Request;
use App\Modules\CrudController;
use App\Modules\SelectableTrait;
use App\Exceptions\NotFoundException;
use App\Exceptions\ErrorCreateException;
use App\Modules\Organization\Services\CompanyService;

class CompanyController extends CrudController 
{
    use SelectableTrait;
    
    protected $service;

    public function __construct(CompanyService $service, Request $request)
    {
        $this->service = $service;
        parent::__construct($request);
    }

    public function saveImage()
    {
        
        if ($this->request->has('company_id')){
            $company =  $this->service->getCompany($this->request->company_id);

        } else {
            $company = $this->userInfo->company;

        }

        $this->request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        try {
            $this->authorizeAction('upload', $company );
        } catch (AuthorizationException $exception) {
            throw new ForbiddenException();
        }

        $path = glob(public_path('company/'.$company->id.'.*'));
        foreach ($path as $value) {
            unlink($value);
        }

        //$imageName = $this->getCompanyId().'.'.$this->request->logo->extension();  
        $imageName = $company->id.'.'.$this->request->logo->extension();  
     

        if ($this->request->logo->move(public_path('company'), $imageName)){
            return $imageName;
        } else {
            return false;
        }

    }
    
}