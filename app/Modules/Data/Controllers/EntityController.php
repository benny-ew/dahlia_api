<?php

namespace App\Modules\Data\Controllers;

use App\Constants\HttpCodes;
use Illuminate\Http\Request;
use App\Modules\CrudController;
use App\Modules\SelectableTrait;
use App\Exceptions\ForbiddenException;
use App\Modules\Data\Services\EntityService;
use Illuminate\Auth\Access\AuthorizationException;


class EntityController extends CrudController 
{
    use SelectableTrait;
    
    protected $service;

    public function __construct(EntityService $service, Request $request)
    {
        $this->service = $service;
        parent::__construct($request);
    }

    public function saveImage()
    {
        
        if ($this->request->has('Entity_id')){
            $Entity =  $this->service->getEntity($this->request->Entity_id);

        } else {
            $Entity = $this->userInfo->Entity;

        }

        $this->request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        try {
            $this->authorizeAction('upload', $Entity );
        } catch (AuthorizationException $exception) {
            throw new ForbiddenException();
        }

        $path = glob(public_path('Entity/'.$Entity->id.'.*'));
        foreach ($path as $value) {
            unlink($value);
        }

        //$imageName = $this->getEntityId().'.'.$this->request->logo->extension();  
        $imageName = $Entity->id.'.'.$this->request->logo->extension();  
     

        if ($this->request->logo->move(public_path('Entity'), $imageName)){
            return $imageName;
        } else {
            return false;
        }

    }
    
}