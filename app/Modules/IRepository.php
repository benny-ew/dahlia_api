<?php

namespace App\Modules;

use Illuminate\Database\Eloquent\Model;


interface IRepository 
{
    function getAll($params);

    function get(string $id, $params);

    function create(Model $param);

    function update($id, array $param);

    function delete($id);

    function getModelName();

}