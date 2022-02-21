<?php

namespace App\Modules;

trait SelectableTrait 
{
    public function getSelectOptions()
    {
        
        $service = $this->service;

        $params = [];
        $params['with'] = [];
        $params['filter'] = [];
        $params['paginate'] = [];
        $this->request->has('fields') ? $params['fields'] = explode(',',$this->request->fields) : $params['fields'] = ['id','code','name'];        

        return $service->getSelectOptions($params);

    }
}