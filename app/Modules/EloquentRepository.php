<?php

namespace App\Modules;

use App\Exceptions\NotFoundException;
use App\Exceptions\NoContentException;
use Illuminate\Database\Eloquent\Model;
use App\Exceptions\ErrorCreateException;


abstract class EloquentRepository
{
    
    public $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getModelName() : string
    {
        if ($this->model)
            return get_class($this->model);
    }

    public function getAll($params)
    {

        $this->model = $this->model->orderBy('id', 'desc');

        if ($params['fields'] != []) {
            array_push($params['fields'], $this->model->getPrimaryKey());
            $this->model = $this->model->select($params['fields']);
        }

        if ($params['with'] != []) {
            $this->model = $this->model->with($params['with']);
        }

        if ($params['filter'] != [])
        {
            foreach ($params['filter'] as $key => $value)
            {
                $this->model = $this->model->where($key, 'LIKE' ,'%'.$value.'%');
            }
        }

        if ($params['orderby'] != [])
        {
            foreach ($params['orderby'] as $key => $value)
            {
                $this->model = $this->model->orderBy($value, $key);
            }
        }

        if ($params['paginate']) {
            $this->model = $this->model->paginate();
        }


        if ($params['company'] != []){
            $this->model = $this->model->where('company_id',$params['company']);
        }

        return $this->model->get();
        
    }

    public function find(string $id)
    {
        
        $returnItem = $this->model->where($this->model->getPrimaryKey(), $id)->first();

        //throw_if($returnItem == null, new NotFoundException());

        if (!$returnItem) 
            abort (404,'Data not found');

        return $returnItem;
    }

    public function get(string $id, $params=[])
    {
        $object = $this->model->where($this->model->getPrimaryKey(), $id);
        
        if (!$params==[]){
            if ($params['fields'] != []) {
                array_push($params['fields'], $this->model->getPrimaryKey());
                $object = $object->select($params['fields']);
            }

            if ($params['with'] != []) {
                $objectl = $object->with($params['with']);
            }
        }

        $returnItem = $object->first();
        
        if (!$returnItem) 
            abort (404,'Data not found');

        return $returnItem;
    }

    public function create(Model $model)
    {
        throw_if(!$model->save(), new ErrorCreateException('check parameters'));
        
        return ['id' => $model->id];
        
    }

    public function update($id, array $params)
    {
        $object = $this->model->find($id);

        foreach ($params as $key => $value) {
            $object->$key = $value;
        }
        return $object->save();

    }

    public function delete($id)
    {
        $user=$this->model->find($id);
        return $user->delete();
    }

    public function findOne(string $email)
    {

    }
    
}