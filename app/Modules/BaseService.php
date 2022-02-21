<?php

namespace App\Modules;


abstract class BaseService 
{

    public function getModelName()
    {
        return $this->repository->getModelName();
    }

    public function getSelectOptions($params)
    {
        return $this->repository->getAll($params);
    }

    public function find($id)
    {        
        return $this->repository->find($id);
    }

    protected function toDataView($items, $params, string $type)
    {

        $listItems = $items->toArray();
        
        $returnArray = [];

        if ($params['paginate']) {

            $returnArray['data']=[];

            foreach ($listItems['data'] as $item) {

                $detail['id'] = $item['id'];
                $detail['type'] = $type;
                $detail['attributes'] = $item;
                $detail['link'] = $params['url'].'/'.$item['id'];
                
                array_push($returnArray['data'],$detail);
            }

            $returnArray['meta']['total'] = $listItems['total'];
            $returnArray['meta']['path'] = $listItems['path'];
            $returnArray['meta']['per_page'] = $listItems['per_page'];
            $returnArray['meta']['links'] = $listItems['links'];
            $returnArray['meta']['current_page'] = $listItems['current_page'];
            $returnArray['meta']['last_page'] = $listItems['last_page'];
            $returnArray['meta']['last_page_url'] = $listItems['last_page_url'];
            $returnArray['meta']['first_page_url'] = $listItems['first_page_url'];
            $returnArray['meta']['next_page_url'] = $listItems['next_page_url'];
            $returnArray['meta']['prev_page_url'] = $listItems['prev_page_url'];
            $returnArray['meta']['from'] = $listItems['from'];
            $returnArray['meta']['to'] = $listItems['to'];

        } else {
            $returnArray['data']=[];

            foreach ($listItems as $item) {

                $detail['id'] = $item['id'];
                $detail['type'] = $type;
                $detail['attributes'] = $item;
                $detail['link'] = $params['url'].'/'.$item['id'];
                
                array_push($returnArray['data'],$detail);
            }
        }

    
        return $returnArray;
    }

    

} 